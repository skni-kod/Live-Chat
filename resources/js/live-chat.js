import Pusher from 'pusher-js';

class LiveChat{
    #appId;
    #variables;
    static #config = {
        'endpoint_url': 'live_chat.test',
        'pusher_id': '14a762b397f82fe9ae04',
        'pusher_cluster': ''
    };

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

    countVisits(){
        const visitorId = this.#getCompleteVisitorId();

    }

    #hasActiveConversation(){
        const hasActiveChat = sessionStorage.getItem('has_active_conversation');
        return !(hasActiveChat === undefined || hasActiveChat === null);
    }

    #connectConversation(conversationData){
        const pusher = new Pusher(import.meta.env.VITE_PUSHER_APP_KEY, {
            cluster: 'eu'
        });
    }

    #loadConversation(){

    }

    #createConversation(){
        const userAgent = navigator.userAgent;
        const visitorId = this.#getCompleteVisitorId()
        const options = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({userAgent: userAgent, visitorId: visitorId, variables: this.#variables})
        };

        fetch(LiveChat.#config.endpoint_url, options)
            .then(response => response.json())
            .then(data => this.#connectConversation(data));
    }



    #manageConversation(){
        if(!this.#hasActiveConversation()) this.#createConversation();


    }

    #listenChatOpen(){
        document.querySelector('#live_chat').addEventListener('click', this.#manageConversation);
    }

    #listenEvents(){
        this.#listenChatOpen();

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

var live_chat = new LiveChat('fdfdffd');


