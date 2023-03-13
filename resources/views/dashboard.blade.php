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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/themes/prism.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/prism.min.js"></script>


    @vite(['resources/js/app.js'])
    @vite(['resources/js/support-chat.js'])
</head>

<body class="g-sidenav-show   bg-gray-100">
<div class="min-height-300 bg-primary position-absolute w-100"></div>
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
                <a class="nav-link active" href="./pages/dashboard.html">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./pages/tables.html">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dostępni pracownicy</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./pages/rtl.html">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Regulamin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./settings">
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
                <a class="nav-link " href="./profile">
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

<main class="main-content position-relative border-radius-lg ">
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
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
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
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- LiveChat Stats Begin -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-4 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Users</p>
                                    <h5 class="font-weight-bolder">
                                        2,300
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                                        since last week
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
                                    <h5 class="font-weight-bolder">
                                        +3,462
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                        since last quarter
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Client Satisfaction</p>
                                    <h5 class="font-weight-bolder">
                                        $53,000
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-satisfied text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                            <p class="mb-0">
                            <div class="progress-wrapper">
                                <div class="progress-info">
                                    <div class="progress-percentage">
                                        <span class="text-sm font-weight-bold">35% positive</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LiveChat Stats End -->


        <!--- Sekcja aktualnych chatów ---->
        <div class="row mt-7">

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Zaproś osoby do obsługi chatu</h5>
                            <p class="card-text">Stwórz zespół i odpowiadajcie wspólnie na pytania klientów.</p>
                            <a href="#" class="btn btn-primary mt-2">Zarządzaj zespołem</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Dołącz do istniejącego zespołu</h5>
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Podaj kod zespołu</span>
                                    <input type="text" class="form-control" placeholder="Wpisz kod" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary">Dołącz</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card">
                        <!-- Card body -->
                        <div class="card-body">
                            <h3 class="card-title mb-3">Instalacja</h3>
                            <p>Aby korzystać z czatu wystarczy, że załączysz poniższy kod JS na swojej stronie: </p>
                            <pre id="installation" class="language-js"><code>&lt;script src=&quot;https:/strona.pl&quot;&gt;&lt;/script&gt;</code><br><code>&lt;script&gt;const chat = new LiveChat(&quot;{{$app_id}}&quot;);&lt;/script&gt;</code></pre>
                            <button id="copy_installation" class="btn btn-primary mt-2">Kopiuj kod</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="modal fade" id="modal-confirm-close-conversation" tabindex="-1" role="dialog" aria-labelledby="modal-confirm-close-conversation" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="py-3 text-center">
                                    <i class="ni ni-bell-55 ni-3x"></i>
                                    <h4 class="text-gradient text-danger mt-4">Na pewno chcesz zakończyć konwersację ?</h4>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Anuluj</button>
                                <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Tak, zakończ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="row">
                    @foreach($conversations['active'] as $conversation)
                        <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Data</p>
                                        <h5 class="font-weight-bolder">
                                            Nazwa strony
                                        </h5>
                                        <span class="text-primary text-sm font-weight-bolder">#{{$conversation->conversation_id}}</span>
                                        <p class="mb-0">
                                            {{$conversation->message}}
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-center mb-3">
                                        <div class="p-2">
                                            <button type="button" data-conversation-id="{{$conversation->conversation_id}}" class="fixed-plugin-button btn btn-default write-response">Odpowiedz</button>
                                        </div>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-confirm-close-conversation">Zakończ</button>
                                        </div>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-danger">Zablokuj</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>

            </div>




            <div class="col-lg-4 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Osoba 2</p>
                            <h5 class="font-weight-bolder">
                                Imie Nazwisko
                            </h5>
                            <p class="mb-0">
                                <span class="text-primary text-sm font-weight-bolder">#Chat-ID</span></br>
                                    Krótki opis problemu </br>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis efficitur, dui sed pharetra eleifend, nibh tellus luctus dolor, in porta diam arcu id risus.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-3">
                        <div class="p-2">
                            <button type="button" class="btn btn-default">Zajme się tym!</button>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-success">Zakończ</button>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-danger">Zablokuj</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Osoba 3</p>
                            <h5 class="font-weight-bolder">
                                Imie Nazwisko
                            </h5>
                            <p class="mb-0">
                                <span class="text-primary text-sm font-weight-bolder">#Chat-ID</span></br>
                                    Krótki opis problemu </br>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis efficitur, dui sed pharetra eleifend, nibh tellus luctus dolor, in porta diam arcu id risus.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-3">
                        <div class="p-2">
                            <button type="button" class="btn btn-default">Zajme się tym!</button>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-success">Zakończ</button>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-danger">Zablokuj</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-4 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Osoba 4</p>
                            <h5 class="font-weight-bolder">
                                Imie Nazwisko
                            </h5>
                            <p class="mb-0">
                                <span class="text-primary text-sm font-weight-bolder">#Chat-ID</span></br>
                                    Krótki opis problemu </br>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis efficitur, dui sed pharetra eleifend, nibh tellus luctus dolor, in porta diam arcu id risus.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-3">
                        <div class="p-2">
                            <button type="button" class="btn btn-default">Zajme się tym!</button>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-success">Zakończ</button>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-danger">Zablokuj</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Osoba 5</p>
                            <h5 class="font-weight-bolder">
                                Imie Nazwisko
                            </h5>
                            <p class="mb-0">
                                <span class="text-primary text-sm font-weight-bolder">#Chat-ID</span></br>
                                    Krótki opis problemu </br>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis efficitur, dui sed pharetra eleifend, nibh tellus luctus dolor, in porta diam arcu id risus.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-3">
                        <div class="p-2">
                            <button type="button" class="btn btn-default">Zajme się tym!</button>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-success">Zakończ</button>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-danger">Zablokuj</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Osoba 6</p>
                            <h5 class="font-weight-bolder">
                                Imie Nazwisko
                            </h5>
                            <p class="mb-0">
                                <span class="text-primary text-sm font-weight-bolder">#Chat-ID</span></br>
                                    Krótki opis problemu </br>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis efficitur, dui sed pharetra eleifend, nibh tellus luctus dolor, in porta diam arcu id risus.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-3">
                        <div class="p-2">
                            <button type="button" class="btn btn-default">Zajme się tym!</button>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-success">Zakończ</button>
                        </div>
                        <div class="p-2">
                            <button type="button" class="btn btn-danger">Zablokuj</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="javascript:;" tabindex="-1">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="javascript:;">1</a></li>
                <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="javascript:;">
                    <i class="fa fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>

        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            <a href="#" class="font-weight-bold" target="_blank">SKNI KOD</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</main>

<template id="message-support">
    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg float-right">
        <div class="d-flex align-items-center ms-auto">
            <div class="d-flex flex-column">
                <span class="mb-2 text-sm message-date"></span>
                <h6 class="mb-2 text-xs border-1 d-flex p-4 mb-2 bg-blue text-white border-radius-lg message-content"></h6>
            </div>
        </div>
    </li>
</template>
<template id="message-client">
    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
        <div class="d-flex align-items-center">
            <i class="fas fa-user mb-0 me-3 btn-sm d-flex align-items-center justify-content-center" aria-hidden="true"></i>
            <div class="d-flex flex-column">
                <span class="mb-2 text-sm message-date"></span>
                <h6 class="mb-2 text-xs border-1 d-flex p-4 mb-2 bg-gray-100 border-radius-lg message-content"></h6>
            </div>
        </div>
    </li>
</template>

<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="ni ni-chat-round py-2"> </i>
    </a>

    <div class="card border shadow-lg" style="border-radius: 25px;">
        <div class="card-header  pb-0 px-3">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-primary shadow-danger text-center rounded-circle">
                            <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col">
                        <span><b>Imie Nazwisko</b></span>
                        <div class="stats">
                            <small>Krótki opis</small>
                        </div>
                    </div>
                    <div class="col-auto text-right">
                        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-3 " style="min-height: 500px;">
                <div class="row">

                    <div class="col-9">
                        <ul class="list-group" style="max-height: 500px; overflow-y: scroll;" id="chat-messages">

                        </ul>
                    </div>
                    <div class="col-3"></div>
                </div>


            </div>
            <div class="col-9">
                <div class="card-body pt-sm-3 pt-0 overflow-auto">
                    <!--- Start Chat Input --->
                    <div class="w-100 text-center">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="message-box" placeholder="Tutaj możesz napisać">
                            <button class="btn btn-outline-primary mb-0" type="button" id="send-message">
                                <i class="ni ni-send" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <!--- End Chat Input --->
                    <div class="d-flex">
                        <button class="btn bg-gradient-danger w-100 px-3 mb-2">Zakończ czat</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--   Core JS Files   -->
<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('js/plugins/chartjs.min.js')}}"></script>

<script src="{{asset('js/argon-dashboard.js')}}"></script>


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

    <script>
        Prism.highlightAll();


        const textToCopy = document.getElementById("installation");
        const copyButton = document.getElementById("copy_installation");

        copyButton.addEventListener("click", function() {
            // Get the text inside the <pre> element and remove consecutive spaces
            const text = textToCopy.textContent.replace(/\s+/g, " ");

            // Copy the modified text to the clipboard
            const temp = document.createElement("textarea");
            temp.value = text;
            document.body.appendChild(temp);
            temp.select();
            document.execCommand("copy");
            document.body.removeChild(temp);
        });
    </script>
</body>

</html>
