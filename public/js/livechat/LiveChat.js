class LiveChat{
    #appId;
    #variables;

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

    getVisitorId(){
        return localStorage.getItem('visitor_id');
    }

    countVisits(){
        const visitorId = this.getVisitorId();
        if(!visitorId){
            const visitorId = this.#createVisitorId();

        }
    }

    #listenChatCreate(){
        document.querySelector('#live_chat').addEventListener('click', this.createConversation);
    }

    constructor(appId, variables = {}) {
        this.#appId = appId;
        this.#variables = variables;
        this.#listenChatCreate();
    }

    addVariable(name, value){
        this.#variables[name] = value;
    }

    #createConversation(){
        let userAgent = navigator.userAgent;

    }
}
