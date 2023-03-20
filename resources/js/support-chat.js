import Pusher from "pusher-js";

class SupportChat {
    #activeConversation;
    #conversationToClose;
    #channel;
    #audio;
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

    #listenChatOpen(){
        document.querySelectorAll('.write-response').forEach(element => {
            element.addEventListener('click', ()=>{
                const conversation_id = element.getAttribute('data-conversation-id');
                this.#activeConversation = conversation_id;
                this.#connect()
                    .then(() => {
                        this.#listenNewMessage();
                    });

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
            });
        });
    }

    #loadAudio(){
        this.#audio = new Audio('/sounds/sound_1.mp3');
    }


    #listenEvents(){
        this.#listenChatOpen();
        this.#listenMessageSend();

    }

    constructor() {
        this.#activeConversation = null;
        this.#conversationToClose = null;
        this.#listenEvents();
        this.#loadAudio();
    }

}

const support = new SupportChat();


