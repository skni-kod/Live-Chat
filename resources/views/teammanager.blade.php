@extends('layouts.authorized')
@section('content')
    <div class="container-fluid py-3">
        <div class="row justify-content-center ">
            <div class="col-10 ">
                <div class="card ">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="mb-0 font-weight-bold">Twój kod zespołu:</p>
                                    <h5 class="font-weight-bolder ">
                                        @if ($joinCode)
                                            <samp id="join-code-field">{{ $joinCode }}</samp>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn btn-primary copy-btn mr-2"
                                        data-clipboard-text="{{ $joinCode }}">Skopiuj kod
                                </button>
                                <form id="generate-code-form" method="POST" action="{{ route('team.generatecode') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success new-code-btn ms-4">Wygeneruj nowy kod
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    <div class="row mt-4 justify-content-center ">
        <div class="mb-4 col-10 ">
            <div class="card ">
                <div class="card-header p-3">
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
                                            <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Avatar"
                                                 class="rounded-circle me-2" width="24" height="24">
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
                                            <button type="submit" class="btn btn-danger" style="margin-bottom: 0;">
                                                Wyrzuć
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="mailto:{{ $user->email }}" method="post" enctype="text/plain">
                                            <button type="submit" class="btn btn-dark"
                                                    style="margin-bottom: 0; margin-left: 0;">Napisz
                                            </button>
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
@endsection
