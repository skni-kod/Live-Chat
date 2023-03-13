import Pusher from "pusher-js";

class SupportChat {
    #activeConversation;
    #channel;

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

    #insertMessage(message, sentAt, sentBySupport){
        let template_id = '#message-client';
        if(sentBySupport) template_id = '#message-support';

        const template = document.querySelector(template_id).content;
        const clonedElement = template.firstElementChild.cloneNode(true);
        clonedElement.querySelector('.message-content').innerHTML = message;
        const chatMessages = document.querySelector('#chat-messages');
        chatMessages.appendChild(clonedElement);

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
            this.#insertMessage(data.message, '', data.is_support_agent);
        }.bind(this));
    }

    #listenMessageSend(){
        document.querySelector('#send-message').addEventListener('click', function(){
            const message = document.querySelector('#message-box').value;
            this.#sendMessage(message);
        }.bind(this));
    }

    #connect(){
        const pusher = new Pusher(import.meta.env.VITE_PUSHER_APP_KEY, {
            cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER
        });

        this.#channel = pusher.subscribe('chat');
        //this.#channel.trigger('chat', 'NewChatMessage', { message: '' });
    }

    #listenChatOpen(){
        document.querySelectorAll('.write-response').forEach(element => {
            element.addEventListener('click', ()=>{
                const conversation_id = element.getAttribute('data-conversation-id');
                this.#activeConversation = conversation_id;
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

    #listenEvents(){
        this.#connect();
        this.#listenChatOpen();
        this.#listenMessageSend();
        this.#listenNewMessage();


    }

    constructor() {
        this.#activeConversation = null;
        this.#listenEvents();

    }

}

const support = new SupportChat();


