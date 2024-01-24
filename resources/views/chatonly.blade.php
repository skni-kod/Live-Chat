<!DOCTYPE html>
<html lang="en-us">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Page Title</title>
    <script src="{{asset('js/livechat-skni.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/livechat-skni.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>

<body>

<div class="livechat-container">
    <div class="livechat-header" style="background-color: {{ $chat->chat_color }}">
        <div id="livechat-header-information">
            <span class="livechat-text-color" id="livechat-title" >{{ $chat->chat_title }}</span>
            <span class="livechat-text-color" id="livechat-status">{{ $chat->status }} </span>
        </div>
        <div id="livechat-close">
            <button id="livechat-close-btn">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>
    <div class="livechat-body">
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
        <div class="livechat-message">
            <div class="livechat-ingoing">
                <div class="livechat-message-sender-name">
                    Donald Duck
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
        <form>
            <input type="text" id="livechat-messagebox" placeholder="{{ $chat->message_box }}">
            <button type="submit" id="livechat-send-button" style="background-color: {{$chat->chat_color}}">Wyślij</button>
        </form>
    </div>
</div>

    <a id="livechat-expand-btn" onclick="livechatToggleChat()">
        <i class="fa-solid fa-comment"></i>
    </a>
    <script src="https://kit.fontawesome.com/dfb9cee77f.js" crossorigin="anonymous"></script>

</body>

</html>
