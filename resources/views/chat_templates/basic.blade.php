<div class="livechat-container expanded">
    <div class="livechat-header" style="background-color: {{ $chat->chat_color }}">
        <div id="livechat-header-information">
            <span class="livechat-text-color" id="livechat-title" >{{ $chat->chat_title }}</span>
            <span class="livechat-text-color" id="livechat-status">{{ $chat->status }} </span>
        </div>
        <div id="livechat-close">
            <button id="livechat-close-btn">
                X
            </button>
        </div>
    </div>
    <div class="livechat-body" id="chat-messages">
    </div>
    <div class="livechat-footer">
        <form id="livechat-form">
            <input type="text" id="livechat-messagebox" placeholder="{{ $chat->message_box }}">
            <button type="submit" id="livechat-send-button" style="background-color: {{$chat->chat_color}}">Wyślij</button>
        </form>
    </div>
</div>
<template id="message-client">
    <div class="livechat-message">
        <div class="livechat-ingoing">
            <div class="livechat-message-sender-name">
                Ty
            </div>
            <div class="livechat-message-content message-content">
            </div>
            <div class="livechat-message-timestamp">

            </div>
        </div>
    </div>
</template>
<template id="message-support">
    <div class="livechat-message">
        <div class="livechat-outgoing">
            <div class="livechat-message-sender-name">
                Support
            </div>
            <div class="livechat-message-content message-content"></div>
            <div class="livechat-message-timestamp"></div>
        </div>
    </div>
</template>
