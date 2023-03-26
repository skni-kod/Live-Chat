import Pusher from "pusher-js";

class SupportChat {
    #activeConversation;
    #conversationToClose;
    #channel;
    #audio;
    #supportChannel;
    #loadMessages(conversation_id){

    }

    #sendMessage(content){
        const options = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({conversation_id: this.#activeConversation, message: content})
        };

        fetch("/support-message", options)
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.log(error));
    }

    #scrollToBottom() {
        const messages = document.querySelector('#chat-messages');
        messages.scrollTop = messages.scrollHeight;
    }


    #insertMessage(message, sentAt, supportMessage){
        let template_id = '#message-client';
        if(supportMessage) template_id = '#message-support';

        const template = document.querySelector(template_id).content;
        const clonedElement = template.firstElementChild.cloneNode(true);
        clonedElement.querySelector('.message-content').innerHTML = message;
        const chatMessages = document.querySelector('#chat-messages');
        chatMessages.appendChild(clonedElement);
        this.#scrollToBottom();
    }

    #insertMessages(data){
        if(data.status === "ok"){
            document.querySelector('#chat-messages').innerHTML = '';
            data.data.forEach(row =>{
                let sentBySupport = true;
                if(row.agent_id === null) sentBySupport = false;
                this.#insertMessage(row.message, row.sent_at, sentBySupport);
            });
        }
    }

    #listenNewMessage(){
        this.#channel.bind('NewChatMessage', function(data) {
            if(!data.is_support_agent) this.#audio.play();
            this.#insertMessage(data.message, '', data.is_support_agent);
        }.bind(this));
    }

    #handleSendMessage() {
        const textBox = document.querySelector('#message-box');
        const message = textBox.value;
        textBox.value = "";
        this.#sendMessage(message);
    }

    #listenMessageSend(){
        document.querySelector('#send-message').addEventListener('click', this.#handleSendMessage.bind(this));
    }

    #closeChatConnection() {
        if (this.#channel) this.#channel.unsubscribe();
    }

    #connect() {
        return new Promise((resolve, reject) => {
            this.#closeChatConnection();
            const pusher = new Pusher(import.meta.env.VITE_PUSHER_APP_KEY, {
                cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER
            });

            this.#channel = pusher.subscribe('chat'+this.#activeConversation);

            this.#channel.bind('pusher:subscription_succeeded', () => {
                //console.log('Pusher connection established');
                resolve();
            });

            pusher.connection.bind('error', (err) => {
                //console.error('Pusher connection error:', err);
                reject(err);
            });
        });
    }

    #listenConversationClose(){
        document.querySelectorAll('.conversation-close').forEach(element =>{
            element.addEventListener('click', () => {
                this.#conversationToClose = element.getAttribute('data-conversation-id');
            });
        });
    }

    #conversationCloseConfirm(){

        //this.#conversationToClose
    }

    #closeOnClickOutside(buttonElement, chatWindow){
        const fixedPluginButtonNav = document.querySelector('.fixed-plugin-button-nav');
        const fixedPluginCard = document.querySelector('.fixed-plugin .card');

        document.querySelector('body').onclick = function(e) {
            if (e.target !== buttonElement && e.target !== fixedPluginButtonNav && e.target.closest('.fixed-plugin .card') !== fixedPluginCard) {
                chatWindow.classList.remove('show');
            }
        }
    }

    #openChat(event) {
        const element = event.target;
        const conversation_id = element.getAttribute('data-conversation-id');
        this.#activeConversation = conversation_id;
        this.#connect()
            .then(() => {
                this.#listenNewMessage();
            });

        const chatWindow = document.querySelector('.fixed-plugin');
        if (!chatWindow.classList.contains('show')) chatWindow.classList.add('show');
        else chatWindow.classList.remove('show');

        this.#changeChatBlinkState(document.querySelectorAll('[data-chat-id="' + conversation_id + '"]')[0].querySelector('.chat_content'), false);

        this.#closeOnClickOutside(element, chatWindow);

        const options = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({conversation_id: conversation_id})
        };

        fetch('/support-chat-open', options)
            .then(response => response.json())
            .then(data => this.#insertMessages(data))
            .catch(error => console.log(error));


    }

    #changeChatBlinkState(element, show = true){
        if(show) element.classList.add('chat-blink');
        else element.classList.remove('chat-blink');
    }

    #listenChatOpen(element){
        element.addEventListener('click', this.#openChat.bind(this));
    }

    #listenChatsOpen(){
        document.querySelectorAll('.write-response').forEach(element => {
            this.#listenChatOpen(element);
        });
    }

    #loadAudio(){
        this.#audio = new Audio('/sounds/sound_1.mp3');
    }

    #listenChatClose(){
        const fixedPluginButton = document.querySelector('.fixed-plugin-button');
        const closeButton = document.querySelectorAll('.fixed-plugin-close-button');
        const fixedPluginButtonNav = document.querySelector('.fixed-plugin-button-nav');
        const fixedPluginCard = document.querySelector('.fixed-plugin .card');
        const fixedPlugin = document.querySelector('.fixed-plugin');

        closeButton.forEach(function(el) {
            el.onclick = function() {
                fixedPlugin.classList.remove('show');
            }
        })
    }

    #chatsRefresh(data, isSupportMessage){
        const templateWindow = document.querySelector('#chat-window');
        const clonedElement = templateWindow.content.cloneNode(true);
        clonedElement.querySelector('.chat_item').setAttribute('data-chat-id', data.conversation_id);
        clonedElement.querySelector('.updated_at').innerHTML = data.updated_at;
        clonedElement.querySelector('.visitor_id').innerHTML = 'ustawić visitor';
        clonedElement.querySelector('.conversation_id').innerHTML = '#'+data.conversation_id;
        clonedElement.querySelector('.message').innerHTML = data.message;
        const responseButton = clonedElement.querySelector('.write-response');
        responseButton.setAttribute('data-conversation-id', data.conversation_id);
        clonedElement.querySelector('.close_conversation').setAttribute('data-conversation-id', data.conversation_id);
        if(!isSupportMessage){
            this.#changeChatBlinkState(clonedElement.querySelector('.chat_content'));
            if(this.#activeConversation !== data.conversation_id) this.#audio.play();
        }
        const oldChat = document.querySelectorAll('[data-chat-id="' + data.conversation_id + '"]')[0];
        if(oldChat) oldChat.remove();
        const conversationsList = document.querySelector('#conversations-list');
        conversationsList.insertBefore(clonedElement, conversationsList.firstChild);
        responseButton.addEventListener('click', this.#openChat.bind(this));
        this.#listenChatOpen(clonedElement);
    }

    #connectSupportChannel(){
        const agent_id = document.querySelector('#support_id').getAttribute('data-user-id');
        const pusher = new Pusher(import.meta.env.VITE_PUSHER_APP_KEY, {
            cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER
        });

        this.#supportChannel = pusher.subscribe('support'+agent_id);
        this.#supportChannel.bind('SupportCall', function(data) {
            this.#chatsRefresh(data.data, data.is_support_message);
            console.log(data);
        }.bind(this));

    }


    #listenEvents(){
        this.#listenChatsOpen();
        this.#listenMessageSend();
        this.#listenChatClose();
    }

    constructor() {
        this.#activeConversation = null;
        this.#conversationToClose = null;
        this.#connectSupportChannel();
        this.#listenEvents();
        this.#loadAudio();

    }

}

const support = new SupportChat();


