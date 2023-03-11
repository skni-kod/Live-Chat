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

    <title>LiveChat | TeamManager</title>

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
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('team') }}">
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
                <a class="nav-link" href="{{ route('settings') }}">
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

<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Zarządzaj zespołem</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Zarządzaj zespołem</h6>
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

    <div class="container-fluid py-4">
        <div class="row justify-content-end">
            <div class="col-3">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="mb-0 font-weight-bold">Twój kod zespołu:</p>
                                    <h5 class="font-weight-bolder">
                                        @if ($joinCode)
                                            <samp id="join-code-field">{{ $joinCode }}</samp>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-primary copy-btn mr-2" data-clipboard-text="{{ $joinCode }}">Copy Code</button>
                                <form id="generate-code-form" method="POST" action="{{ route('team.generatecode') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success new-code-btn ms-4">Generate New Code</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row mt-4 justify-content-center">
            <div class="mb-4 col-9 ">
                <div class="card mx-2">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Lista pracowników</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if ($userData->isEmpty())
                            <p class="ms-5">Nie masz drużyny lub nie masz nikogo w zespole</p>
                        @else
                            <table class="table align-items-center">
                                <thead>
                                <tr>
                                    <th style="width: 10%" class="text-center">ID</th>
                                    <th style="width: 30%">Imię i Nazwisko</th>
                                    <th style="width: 25%; padding-left: 0;">Nazwa użytkownika</th>
                                    <th style="width: 25%; padding-left: 0;">Adres E-Mail</th>
                                    <th style="width: 5%"></th>
                                    <th style="width: 5%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($userData as $user)
                                    <tr>
                                        <td class="w-10">
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Avatar" class="rounded-circle me-2" width="24" height="24">
                                                <div>
                                                    <h6 class="text-sm mb-0">{{ $user->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ms-3">
                                                <h6 class="text-sm mb-0">{{ $user->profile_name }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="text-sm mb-0">{{ $user->name }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="text-sm mb-0">{{ $user->email }}</h6>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('team.remove') }}">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <button type="submit" class="btn btn-danger" style="margin-bottom: 0;">Wyrzuć</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="mailto:{{ $user->email }}" method="post" enctype="text/plain">
                                                <button type="submit" class="btn btn-dark" style="margin-bottom: 0; margin-left: 0;">Napisz</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>

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

<script>

    document.querySelector('.new-code-btn').addEventListener('click', function() {
        axios.post('{{ route('team.generatecode') }}')
            .then(function(response) {
                document.querySelector('#join-code-field').textContent = response.data.join_code;
            })
            .catch(function(error) {
                console.error(error);
            });
    });

</script>

<script src="../js/livechat-skni.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<script>
    var clipboard = new ClipboardJS('.copy-btn');
</script>

<script src="../js/live-chat.js"></script>

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
