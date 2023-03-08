<button id="live_chat">Start conversation</button>
<link rel="stylesheet" href="{{asset('css/livechat-skni.css')}}">


<div class="livechat-message" id="live_chat_message_template" style="display: none;">
    <div class="livechat-{message_type}">
        <div class="livechat-message-sender-name">
            Donald Duck
        </div>
        <div class="livechat-message-content">
            Kwak Kwak Kwak Kwak Kwak
        </div>
        <div class="livechat-message-timestamp">
            16:21
        </div>
    </div>
</div>

<div class="livechat-container">
    <div class="livechat-header">
        <h4 class="livechat-text-color" id="livechat-name-surname">Imie Nazwisko</h4>
        <div id="livechat-close">
            <button id="livechat-close-btn">
                X
            </button>
        </div>
    </div>
    <div class="livechat-body" id="livechat_messages">
        <div class="livechat-message">
            <div class="livechat-outgoing">
                <div class="livechat-message-sender-name">
                    Tom Cruize
                </div>
                <div class="livechat-message-content">
                    Spotkanie jutro o 19, pasuje?
                </div>
                <div class="livechat-message-timestamp">
                    16:20
                </div>
            </div>
        </div>
        <div class="livechat-message">
            <div class="livechat-outgoing">
                <div class="livechat-message-sender-name">
                    Tom Cruize
                </div>
                <div class="livechat-message-content">
                    Do jutra!
                </div>
                <div class="livechat-message-timestamp">
                    16:23
                </div>
            </div>
        </div>
        <div class="livechat-message">
            <div class="livechat-ingoing">
                <div class="livechat-message-sender-name">
                    Donald Duck
                </div>
                <div class="livechat-message-content">
                    Kwak Kwak Kwak Kwak Kwak
                </div>
                <div class="livechat-message-timestamp">
                    16:21
                </div>
            </div>
        </div>
        <div class="livechat-message">
            <div class="livechat-outgoing">
                <div class="livechat-message-sender-name">
                    Tom Cruize
                </div>
                <div class="livechat-message-content">
                    Jakis przykladowy tekst tu pisze nwm
                    Jakis przykladowy tekst tu pisze nwm
                    Jakis przykladowy tekst tu pisze nwm
                </div>
                <div class="livechat-message-timestamp">
                    16:23
                </div>
            </div>
        </div>
        <div class="livechat-message">
            <div class="livechat-outgoing">
                <div class="livechat-message-sender-name">
                    Tom Cruize
                </div>
                <div class="livechat-message-content">
                    Jakis przykladowy tekst tu pisze nwm
                </div>
                <div class="livechat-message-timestamp">
                    16:23
                </div>
            </div>
        </div>
    </div>
    <div class="livechat-footer">
        <form id="live_chat_send_message">
            <input id="live_chat_message_to_send" type="text" placeholder="Tutaj możesz napisać wiadomość">
            <button type="submit">Wyślij</button>
        </form>
    </div>
</div>
@vite(['resources/js/live-chat.js'])
