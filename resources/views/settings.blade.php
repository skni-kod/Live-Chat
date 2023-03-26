@extends('layouts.authorized')
@section('content')
    <div class="container mt-6">
        <div class="row">
            <div class="card">
                <div class="row ms-4 mx-4 mt-4">
                    <h4>Edycja wyglądu</h4>
                    <div class="col-sm-12 col-md-6">
                        <form id="livechat-settings-form" method="POST" action="{{ route('settings.store') }}">
                            @csrf
                            <label class="livechat-label-options">Kolor główny</label>
                            <div class="livechat-color-palette">
                                <div id="livechat-preset-colors">
                                    <button type="button" class="livechat-color-picker-btn" id="livechat-color-btn1" onclick="livechat_updateHeader('#EC7063')"></button>
                                    <button type="button" class="livechat-color-picker-btn" id="livechat-color-btn2" onclick="livechat_updateHeader('#A93226')"></button>
                                    <button type="button" class="livechat-color-picker-btn" id="livechat-color-btn3" onclick="livechat_updateHeader('#9B59B6')"></button>
                                    <button type="button" class="livechat-color-picker-btn" id="livechat-color-btn4" onclick="livechat_updateHeader('#5B2C6F')"></button>
                                    <button type="button" class="livechat-color-picker-btn" id="livechat-color-btn5" onclick="livechat_updateHeader('#3498DB')"></button>
                                    <button type="button" class="livechat-color-picker-btn" id="livechat-color-btn6" onclick="livechat_updateHeader('#1ABC9C')"></button>
                                    <button type="button" class="livechat-color-picker-btn" id="livechat-color-btn7" onclick="livechat_updateHeader('#2ECC71')"></button>
                                    <button type="button" class="livechat-color-picker-btn" id="livechat-color-btn8" onclick="livechat_updateHeader('#F1C40F')"></button>
                                    <button type="button" class="livechat-color-picker-btn" id="livechat-color-btn9" onclick="livechat_updateHeader('#F39C12')"></button>
                                    <button type="button" class="livechat-color-picker-btn" id="livechat-color-btn10" onclick="livechat_updateHeader('#D35400')"></button>
                                    <input type="color" id="livechat-color-picker" name="chatcoloristic" value="{{$chat->chat_color}}"  oninput="livechat_updateHeaderCostum()">
                                </div>
                            </div>
                        </form>
                        <label class="livechat-label-options">Pozycja okna czatu</label>
                        <form id="livechat-side-form" method="POST" action="{{ route('settings.store') }}">
                            @csrf
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-6 col-sm-12">
                                        <label>
                                            <div class="livechat-window-position"><img src="{{asset('img/lewy.png')}}" alt="zdjecie lewe"> </div>
                                            <input type="radio" name="livechat-position-selector" id="livechat-left-select" value="left" onclick="setChatPosition('left')" {{ $chat->side === 'left' ? 'checked' : '' }}>
                                            Po lewej
                                        </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label>
                                            <div class="livechat-window-position"><img src="{{asset('img/prawy.png')}}" alt="zdjecie prawe"> </div>
                                            <input type="radio" name="livechat-position-selector" id="livechat-right-select" value="right" onclick="setChatPosition('right')" {{ $chat->side === 'right' ? 'checked' : '' }}>
                                            Po prawej
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="selected_option" id="selected_option">
                        </form>

                        <label class="livechat-label-options">Personalizacja tekstu czatu</label>
                        <div>
                            <form method="POST" action="{{ route('settings.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="livechat-label-options">Tytuł</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="chat_title" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $chat->chat_title }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="livechat-label-options">Status</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="status" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $chat->status }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="livechat-label-options">Pole tekstowe</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="message_box" aria-label="With textarea">{{ $chat->message_box }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="submit-button" onclick="livechatSavePreferences()">Save</button>
                            </form>
                        </div>
                    </div>


                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="livechat-container-preview">
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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('head-scripts')
    <link rel="stylesheet" href="{{asset('css/livechat-skni.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-colorpicker/2.5.0/jquery.colorpicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-colorpicker/2.5.0/jquery.colorpicker.min.js"></script>
@endsection
@section('background')
    @include('layouts.background')
@endsection
