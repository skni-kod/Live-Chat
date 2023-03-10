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

    #hasActiveConversation(){
        const hasActiveChat = sessionStorage.getItem('has_active_conversation');
        return !(hasActiveChat === undefined || hasActiveChat === null);
    }

    #connectConversation(){

        const pusher = new Pusher(import.meta.env.VITE_PUSHER_APP_KEY, {
            cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER
        });

        this.#channel = pusher.subscribe('chat');
        this.#channel.bind('NewChatMessage', function(data) {
            console.log("dostalem");
            alert(JSON.stringify(data));
        });
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
            body: JSON.stringify({user_agent: userAgent, visitor_id: visitorId, visits: numberOfVisits, variables: this.#variables})
        };

        fetch(import.meta.env.VITE_API_ENDPOINT+"/create-conversation", options)
            .then(response => response.json())
            .then(data => this.#connectConversation(data));
    }

    #manageConversation(){
        if(!this.#hasActiveConversation()) this.#createConversation();
    }

    #listenMessageSend(){
        document.querySelector('#live_chat_send_message').addEventListener('submit', function(event){
             event.preventDefault();
             const originalElement = document.getElementById('live_chat_message_template');
             const copiedElement = originalElement.cloneNode(true);
             copiedElement.removeAttribute('id');
             copiedElement.innerHTML = copiedElement.innerHTML.replace('{message_type}', 'ingoing');
             copiedElement.style.display = "block";

             document.querySelector('#livechat_messages').appendChild(copiedElement);
             const visitorId = this.#getCompleteVisitorId()
             const numberOfVisits = this.#getNumberOfVisits();
             const message = document.querySelector('#live_chat_message_to_send').value;
             const options = {
                 method: 'POST',
                 headers: {
                     'Content-Type': 'application/json'
                 },
                 body: JSON.stringify({visitor_id: visitorId, visits: numberOfVisits, variables: this.#variables, message: message, app_id: this.#appId})
             };

             fetch(import.meta.env.VITE_API_ENDPOINT+"/client-message", options)
                 .then(response => response.json())
                 .then(data => this.#connectConversation(data));
        }.bind(this));
    }

    #listenChatOpen(){
        document.querySelector('#live_chat').addEventListener('click', this.#manageConversation.bind(this));
    }

    #loadConversation(){
        const visitorId = this.#getCompleteVisitorId();
        fetch(import.meta.env.VITE_API_ENDPOINT+"/load-chat/"+visitorId)
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.log(error));

        //Dodać pobieranie html, css chatu

    }

    #onLoadEvents(){
        this.#updateVisits();
        this.#loadConversation();
    }

    #listenPageLoad(){
        window.addEventListener('load', this.#onLoadEvents.bind(this));
    }

    #listenEvents(){
        this.#listenPageLoad();
        //this.#listenChatOpen();
        //this.#connectConversation();
        this.#listenMessageSend();
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


