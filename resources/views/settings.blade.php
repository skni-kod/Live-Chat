<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">

    <title>LiveChat | Dashboard</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('css/livechat-skni.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-colorpicker/2.5.0/jquery.colorpicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-colorpicker/2.5.0/jquery.colorpicker.min.js"></script>

</head>

<body class="g-sidenav-show bg-gray-100">
<div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
</div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#" target="_blank">
            <img src="{{asset('img/logo-ct-dark.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">LiveChat</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('team') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Zarządzaj zespołem</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Regulamin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('settings') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Ustawienia</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidenav-footer mx-3 ">
        <hr class="horizontal dark my-sm">
        <!--- Blokuje tymaczasowo dopóki zaznaczone odbieranie nowych czatów, coś w stylu jestem aktualnie nieaktywny ---->
        <div class="mt-2 mb-3 d-flex">
            <span class="nav-link-text ms-1">Jestem na przerwie</span>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
                <input class="form-check-input mt-1 ms-auto" type="checkbox">
            </div>
        </div>

        <!--- Dopóki zaznaczone będa przychodzić nowe czaty ---->
        <div class="mb-5 d-flex">
            <span class="nav-link-text ms-1">Gotowy do pomocy</span>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
                <input class="form-check-input mt-1 ms-auto" type="checkbox">
            </div>
        </div>
    </div>
</aside>

<div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
            </nav>
            <li class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center dropdown">
                        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">{{ Auth::user()->name }}</span>
                        </a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span class="d-sm-inline d-none" style="color: white; margin-left: 10px; font-size: 14px; font-size: 0.875rem">{{ __('Wyloguj') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
        </div>
    </nav>
    <!-- End Navbar -->
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
<<<<<<< HEAD
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

=======
                                <div class="form-group">
                                    <label class="livechat-label-options">Tytuł</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="chat_title" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $chat->chat_title }}">
>>>>>>> 3c48ce53aa75b491ac8a29a3c781ac16bae628e1
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
                                <button type="submit" class="btn btn-primary" id="submit-button">Save</button>
                            </form>
                        </div>
                    </div>


                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="livechat-container">
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
</div>
</div>

<script src="../js/livechat-skni.js"></script>
<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
