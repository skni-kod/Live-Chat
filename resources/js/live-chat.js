import Pusher from 'pusher-js';

class LiveChat{
    #appId;
    #variables;
    #channel;

    #randomString(length){
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        for (let i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * characters.length));
        }

        return result;
    }

    #createVisitorId(){
        const userAgent = navigator.userAgent;
        const hash = window.btoa(userAgent);
        const randomString = this.#randomString(32);
        const timestamp = Date.now();
        return hash+'-'+randomString+'-'+timestamp;
    }

    #getVisitorId(){
        return localStorage.getItem('visitor_id');
    }

    #saveVisitorId(visitorId){
        localStorage.setItem('visitor_id', visitorId);
    }

    #getCompleteVisitorId(){
        let visitorId = this.#getVisitorId();
        if(visitorId === undefined || visitorId === null){
            visitorId = this.#createVisitorId();
            this.#saveVisitorId(visitorId);
        }
        return visitorId;
    }

    #setAlreadyVisited(){
        sessionStorage.setItem('');
    }

    #setVisits(number_of_visits){
        localStorage.setItem('visits', number_of_visits);
    }

    #getNumberOfVisits(){
        const number_of_visits = localStorage.getItem('visits');
        if(number_of_visits === undefined || number_of_visits === null) return 0;
        return number_of_visits;
    }

    #countVisits(){
        let number_of_visits = this.#getNumberOfVisits();
        this.#setVisits(number_of_visits+1);
    }

    #setActiveConversationId(conversationId){
        sessionStorage.setItem('active_conversation_id', conversationId);
    }

    #getActiveConversationId(){
        const conversationId = sessionStorage.getItem('active_conversation_id');;
        if(conversationId === undefined || conversationId === null) return '';
        else return conversationId;
    }

    #hasActiveConversation(){
        return this.#getActiveConversationId() !== '';
    }

    #removeActiveConversation(){
        sessionStorage.removeItem('active_conversation_id');
    }

    #connectConversation(conversationId){
        this.#setActiveConversationId(conversationId);
        console.log("connect: ", conversationId);
        const pusher = new Pusher(import.meta.env.VITE_PUSHER_APP_KEY, {
            cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER
        });

        this.#channel = pusher.subscribe('chat'+conversationId);
        this.#channel.bind('NewChatMessage', function(data) {
            this.#insertMessage(data.message, '', data.is_support_agent);
        }.bind(this));
        //console.log("polaczenie z konwersacja");
    }

    #updateVisits(){
        if(sessionStorage.getItem('visit_counted') !== 'visited'){
            this.#countVisits();
            sessionStorage.setItem('visit_counted', 'visited');
        }

    }

    #createConversation(){
        const userAgent = navigator.userAgent;
        const visitorId = this.#getCompleteVisitorId()
        const numberOfVisits = this.#getNumberOfVisits();
        const options = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({user_agent: userAgent, visitor_id: visitorId, visits: numberOfVisits, variables: this.#variables, app_id: this.#appId})
        };

        fetch(import.meta.env.VITE_API_ENDPOINT+"/create-conversation", options)
            .then(response => response.json())
            .then(data => {
                if(data.status === "ok") this.#connectConversation(data.conversation_id);
            });
    }

    #connectActiveConversation(){
        if(!this.#hasActiveConversation()){
            this.#removeActiveConversation();
            return false;
        }
        const activeConversation = this.#getActiveConversationId();
        this.#connectConversation(activeConversation);
        return true;
    }

    #manageConversation(){
        if(!this.#hasActiveConversation()) this.#createConversation();
        else this.#connectActiveConversation();
    }

    #listenMessageSend(){
        document.querySelector('#livechat-form').addEventListener('submit', function(event){
             event.preventDefault();

             const visitorId = this.#getCompleteVisitorId()
             const numberOfVisits = this.#getNumberOfVisits();
             const message = document.querySelector('#livechat-messagebox').value;
             const options = {
                 method: 'POST',
                 headers: {
                     'Content-Type': 'application/json'
                 },
                 body: JSON.stringify({visitor_id: visitorId, visits: numberOfVisits, variables: this.#variables, message: message, app_id: this.#appId})
             };

             fetch(import.meta.env.VITE_API_ENDPOINT+"/client-message", options)
                 .then(response => response.json())
        }.bind(this));
    }

    #changeChatState(isOpened = false){
        sessionStorage.setItem('chat_opened', isOpened);
    }

    #closeChat(){
        this.#changeChatState(false);
    }

    #openChat(){
        this.#manageConversation();
        this.#changeChatState(true);
    }

    #isChatOpened(){
        const state = sessionStorage.getItem('chat_opened');
        if(state === undefined || state === null) return false;
        return state;
    }

    #listenChatOpen(){
        document.querySelector('#live_chat').addEventListener('click', this.#openChat.bind(this));
    }

    #insertMessage(message, sentAt, supportMessage){
        let template_id = '#message-client';
        if(supportMessage) template_id = '#message-support';

        const template = document.querySelector(template_id).content;
        const clonedElement = template.firstElementChild.cloneNode(true);
        clonedElement.querySelector('.message-content').innerHTML = message;
        const chatMessages = document.querySelector('#chat-messages');
        chatMessages.appendChild(clonedElement);

    }

    #insertMessages(data){
        document.querySelector('#chat-messages').innerHTML = '';
        data.forEach(row =>{
            let sentBySupport = true;
            if(row.agent_id === null) sentBySupport = false;
            this.#insertMessage(row.message, row.sent_at, sentBySupport);
        });

    }

    #insertChat(data){
        const link = document.createElement("link");
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = data.data.chat_css;
        const head = document.head || document.getElementsByTagName("head")[0];
        if (!document.body) document.body = document.createElement("body");
        head.appendChild(link);
        document.body.insertAdjacentHTML("beforeend", data.data.chat_html);
        this.#insertMessages(data.data.messages);

    }

    #loadConversation(){
        const visitorId = this.#getCompleteVisitorId();
        return fetch(import.meta.env.VITE_API_ENDPOINT+"/load-chat/"+visitorId+'/'+this.#appId)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                return this.#insertChat(data);
            })
            .catch(error => {
                console.log(error);
                throw error;
            });
    }

    #onLoadEvents(){
        if(this.#isChatOpened()) this.#openChat();
        this.#updateVisits();
        this.#loadConversation().then(() => {
            this.#listenMessageSend();
        });
    }

    #listenPageLoad(){
        window.addEventListener('load', this.#onLoadEvents.bind(this));
    }

    #listenEvents(){
        this.#listenPageLoad();
        this.#listenChatOpen();
        //this.#connectConversation();
        //this.#listenMessageSend();
        //this.#connectConversation();
    }

    constructor(appId, variables = {}) {
        this.#appId = appId;
        this.#variables = variables;
        this.#listenEvents();
    }

    addVariable(name, value){
        this.#variables[name] = value;
    }
}

var live_chat = new LiveChat('EynE1r8D1ZZYWrKj');


