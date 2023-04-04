@extends('layouts.authorized')
@section('head-scripts')
    @vite(['resources/js/app.js'])
    @vite(['resources/js/support-chat.js'])
    <link href="{{asset('css/style.css')}}" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
@section('content')
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
                                        {{ $statisticData['visitorCountToday']}}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-sm font-weight-bolder"> Visitor count {{ $statisticData['percentChangeStr'] }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
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
                                        {{ $statisticData['visitorCountNew']}}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-sm font-weight-bolder"> New visitors count {{ $statisticData['percentChangeStrNew'] }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
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
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Agenci w zespole</p>
                                    <h5 class="font-weight-bolder">
                                        {{$agentsCount[1]}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-satisfied text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="progress-wrapper">
                                <div class="progress-info">
                                    <div class="progress-percentage">
                                        <span class="text-sm font-weight-bold">{{$agentsCount[0]}} nowych w ostatnim tygodniu</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LiveChat Stats End -->

        <div id="support_id" data-user-id="{{ auth()->user()->id }}"></div>
        <!--- Sekcja aktualnych chatów ---->
        <div class="row mt-8">

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Zaproś osoby do obsługi chatu</h5>
                            <p class="card-text">Stwórz zespół i odpowiadajcie wspólnie na pytania klientów.</p>
                            <a href="{{url('team')}}" class="btn btn-primary mt-2">Zarządzaj zespołem</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Dołącz do istniejącego zespołu</h5>
                            <form action="{{ route('teams.join') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text"
                                              id="inputGroup-sizing-sm">Podaj kod zespołu</span>
                                        <input type="text" class="form-control @error('team_code') is-invalid @enderror"
                                               name="team_code" placeholder="Wpisz kod"
                                               aria-label="Sizing example input"
                                               aria-describedby="inputGroup-sizing-sm">
                                        @error('team_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Dołącz</button>
                            </form>
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
                            <pre id="installation" class="language-js"><code>&lt;script src=&quot;{{asset('js/live-chat.js')}}&quot;&gt;&lt;/script&gt;</code><br><code>&lt;script&gt;const chat = new LiveChat(&quot;{{$app_id}}&quot;);&lt;/script&gt;</code></pre>
                            <button id="copy_installation" class="btn btn-primary mt-2">Kopiuj kod</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="modal fade" id="modal-confirm-close-conversation" tabindex="-1" role="dialog"
                     aria-labelledby="modal-confirm-close-conversation" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="py-3 text-center">
                                    <i class="ni ni-bell-55 ni-3x"></i>
                                    <h4 class="text-gradient text-danger mt-4">Na pewno chcesz zakończyć konwersację
                                        ?</h4>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Anuluj
                                </button>
                                <button type="button" class="btn bg-gradient-primary confirm-close" data-bs-dismiss="modal">Tak,
                                    zakończ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#active-chats">Aktywne</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#closed-chats">Zakończone</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="active-chats" class="container tab-pane active">
                    <div class="row mt-2" id="conversations-active"></div>
                </div>
                <div id="closed-chats" class="container tab-pane fade">
                    <div class="row mt-2" id="conversations-closed"></div>
                </div>
            </div>
        </div>
        <div class="fixed-plugin">
            <div class="card border shadow-lg" style="border-radius: 25px;">
                <div class="card-header  pb-0 px-3">
                    <div class="container">
                        <div class="row align-items-start">
                            <div class="col-auto">
                                <div
                                    class="icon icon-shape bg-gradient-primary shadow-danger text-center rounded-circle">
                                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col">
                                <span>Chat: <b class="opened-conversation"></b></span>
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
                                <ul class="list-group" style="max-height: 500px; overflow-y: scroll;"
                                    id="chat-messages">

                                </ul>
                            </div>
                            <div class="col-3">
                                <p><strong>IP:</strong> <span class="info-ip"></span></p>
                                <p><strong>Kraj:</strong> <span class="info-country"></span></p>
                                <p><strong>Miasto:</strong> <span class="info-city"></span></p>
                                <p><strong>System:</strong> <span class="info-platform"></span></p>
                                <p><strong>Przeglądarka:</strong> <span class="info-browser"></span></p>
                                <p><strong>Wersja:</strong> <span class="info-browser-version"></span></p>
                                <p><strong>Odwiedziny:</strong> <span class="info-visits"></span></p>
                            </div>
                        </div>


                    </div>
                    <div class="col-9">
                        <div class="card-body pt-sm-3 pt-0 overflow-auto">
                            <!--- Start Chat Input --->
                            <div class="w-100 text-center input-message-section">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="message-box"
                                           placeholder="Tutaj możesz napisać">
                                    <button class="btn btn-outline-primary mb-0" type="button" id="send-message">
                                        <i class="ni ni-send" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    <i class="fas fa-user mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"
                       aria-hidden="true"></i>
                    <div class="d-flex flex-column">
                        <span class="mb-2 text-sm message-date"></span>
                        <h6 class="mb-2 text-xs border-1 d-flex p-4 mb-2 bg-gray-100 border-radius-lg message-content"></h6>
                    </div>
                </div>
            </li>
        </template>
        <template id="chat-window">
            <div class="col-12 col-xl-4 col-lg-6 col-md-6 col-sm-12 chat_item mt-2">
                <div class="card chat_content">
                    <div class="card-body p-4">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold updated_at"></p>
                            <h5 class="font-weight-bolder visitor_id"></h5>
                            <span
                                class="text-primary text-sm font-weight-bolder conversation_id"></span>
                            <p class="mb-0 message"></p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center mb-3">
                            <div class="p-3">
                                <button type="button"
                                        class="fixed-plugin-button btn btn-default write-response">Odpowiedz
                                </button>
                            </div>
                            <div class="p-3">
                                <button type="button"
                                        class="btn btn-success close_conversation" data-bs-toggle="modal"
                                        data-bs-target="#modal-confirm-close-conversation">Zakończ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visitor-data d-none"></div>
            </div>
        </template>
    </div>
@endsection
