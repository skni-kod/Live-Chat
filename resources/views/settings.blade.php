@extends('layouts.authorized')
@section('content')
    <div class="container mt-6">
        <div class="row">
            <div class="card">
                <div class="row ms-4 mx-4 mt-4">
                    <h4>Edycja wyglądu</h4>
                    <div class="col-sm-12 col-md-6">
                        <div>
                            <form method="POST" action="{{ route('settings.store') }}">
                                @csrf
                                <label class="livechat-label-options">Kolor główny</label>
                                <div class="livechat-color-palette">
                                    <input class="color-picker" value="{{ $chat->chat_color }}" data-huebee
                                        name="chatcoloristic" />
                                </div>
                                <label class="livechat-label-options">Pozycja okna czatu</label>
                                <div class="row">

                                    <div class="col-md-6 col-sm-12">
                                        <label>
                                            <div class="livechat-window-position"><img src="{{ asset('img/lewy.png') }}"
                                                    alt="zdjecie lewe"> </div>
                                            <input type="radio" name="chat_position" value="left"
                                                {{ $chat->side === 'left' ? 'checked' : '' }}>
                                            Po lewej
                                        </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label>
                                            <div class="livechat-window-position"><img src="{{ asset('img/prawy.png') }}"
                                                    alt="zdjecie prawe"> </div>
                                            <input type="radio" name="chat_position" value="right"
                                                {{ $chat->side === 'right' ? 'checked' : '' }}>
                                            Po prawej
                                        </label>
                                    </div>
                                </div>
                                <label class="livechat-label-options">Personalizacja tekstu czatu</label>
                                <div class="form-group">
                                    <label class="livechat-label-options">Tytuł</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="chat_title"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                            value="{{ $chat->chat_title }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="livechat-label-options">Status</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="status"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                            value="{{ $chat->status }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="livechat-label-options">Pole tekstowe</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="message_box" aria-label="With textarea">{{ $chat->message_box }}</textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="submit-button"
                                    onclick="livechatSavePreferences()">Zapisz ustawienia</button>
                            </form>
                        </div>
                    </div>


                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="livechat-container-preview">
                            <div class="livechat-header" style="background-color: {{ $chat->chat_color }}">
                                <div id="livechat-header-information">
                                    <span class="livechat-text-color" id="livechat-title">{{ $chat->chat_title }}</span>
                                    <span class="livechat-text-color" id="livechat-status">{{ $chat->status }} </span>
                                </div>
                                <div id="livechat-close">
                                    <button id="livechat-close-btn">
                                        x
                                    </button>
                                </div>
                            </div>
                            <div class="livechat-body">
                                <div class="livechat-message">
                                    <div class="livechat-outgoing">
                                        <div class="livechat-message-sender-name">
                                            Jan Kowalski
                                        </div>
                                        <div class="livechat-message-content">
                                            Hej! Spotkamy się jutro o 19?
                                        </div>
                                        <div class="livechat-message-timestamp">
                                            16:20
                                        </div>
                                    </div>
                                </div>
                                <div class="livechat-message">
                                    <div class="livechat-outgoing">
                                        <div class="livechat-message-sender-name">
                                            Jan Kowalski
                                        </div>
                                        <div class="livechat-message-content">
                                            Planuje zrobić grilla z najbliższymi.
                                        </div>
                                        <div class="livechat-message-timestamp">
                                            16:21
                                        </div>
                                    </div>
                                </div>
                                <div class="livechat-message">
                                    <div class="livechat-ingoing">
                                        <div class="livechat-message-sender-name">
                                            Ania Kowalska
                                        </div>
                                        <div class="livechat-message-content">
                                            Jasne! Na pewno wpadne!!!
                                        </div>
                                        <div class="livechat-message-timestamp">
                                            16:21
                                        </div>
                                    </div>
                                </div>
                                <div class="livechat-message">
                                    <div class="livechat-outgoing">
                                        <div class="livechat-message-sender-name">
                                            Jan Kowalski
                                        </div>
                                        <div class="livechat-message-content">
                                            Świetnie bardzo się cieszę! :)
                                        </div>
                                        <div class="livechat-message-timestamp">
                                            16:23
                                        </div>
                                    </div>
                                </div>
                                <div class="livechat-message">
                                    <div class="livechat-outgoing">
                                        <div class="livechat-message-sender-name">
                                            Jan Kowalski
                                        </div>
                                        <div class="livechat-message-content">
                                            W takim razię do jutra!
                                            P.S. mieszkam na Cieplińskiego 34
                                        </div>
                                        <div class="livechat-message-timestamp">
                                            16:23
                                        </div>
                                    </div>
                                </div>
                                <div class="livechat-message">
                                    <div class="livechat-ingoing">
                                        <div class="livechat-message-sender-name">
                                            Ania Kowalska
                                        </div>
                                        <div class="livechat-message-content">
                                            Okej. Do jutra!
                                        </div>
                                        <div class="livechat-message-timestamp">
                                            16:24
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="livechat-footer">
                                <form>
                                    <input type="text" id="livechat-messagebox"
                                        placeholder="{{ $chat->message_box }}">
                                    <button type="submit" id="livechat-send-button"
                                        style="background-color: {{ $chat->chat_color }}">Wyślij</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/livechat-skni.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/huebee@latest/dist/huebee.min.css" />
    <script src="https://unpkg.com/huebee@latest/dist/huebee.pkgd.min.js"></script>
    @vite(['resources/js/settings.js'])
@endsection
@section('background')
    @include('layouts.background')
@endsection
