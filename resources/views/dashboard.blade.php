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
    @vite(['resources/js/app.js'])
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
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./pages/profile.html">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./pages/sign-in.html">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./pages/sign-up.html">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1 ">Sign Up</span>
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
                        <ul class="dropdown-menu show" aria-labelledby="dropdownMenuButton" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 43px);" data-popper-placement="bottom-start">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="{{asset('img/team-2.jpg')}}" class="avatar avatar-sm  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New message</span> from Laur
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="{{asset('img/small-logos/logo-spotify.svg')}}" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New album</span> by Travis Scott
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                1 day
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                Payment successfully completed
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                2 days
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
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
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LiveChat Stats End -->




        <!--- Sekcja aktualnych chatów ---->
        <div class="row mt-6">
            <div class="col-lg-4 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Osoba 1</p>
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
                    <!-- <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </footer>
    </div>
</main>


<!-- LiveChat Activation-Tool --->
<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="ni ni-chat-round py-2"> </i>
    </a>

    <div class="card border shadow-lg">
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
            <div class="card-body border p-3 ">
                <ul class="list-group">
                    <!--- card card-body border card-plain border-radius-lg d-flex align-items-center flex-row -->
                    <li class="list-group-item border-1 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <h6 class="mb-2 text-sm">Ty</h6>
                            <span class="mb-2 text-xs">Wiadomość 1</span>
                        </div>
                    </li>
                    <li class="list-group-item border-1 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <h6 class="mb-2 text-sm">Osoba 1</h6>
                            <span class="mb-2 text-xs">Wiadomość 2</span>
                        </div>
                    </li>
                    <li class="list-group-item border-1 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <h6 class="mb-2 text-sm">Ty</h6>
                            <span class="mb-2 text-xs">Wiadomość 3</span>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="card-body pt-sm-3 pt-0 overflow-auto">
                <!--- Start Chat Input --->
                <div class="w-100 text-center">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tutaj możesz napisać" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-primary mb-0" type="button" id="button-addon2">
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
<script src="{{asset('js/websocket.js')}}"></script>

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
<script src="{{asset('js/argon-dashboard.min.js?v=2.0.4')}}"></script>
</body>

</html>
