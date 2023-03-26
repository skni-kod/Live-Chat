@extends('layouts.authorized')

@section('content')
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                    <h5 class="mb-1">
                        {{$user->profile->name}} alias. {{$user->name}}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        Rola
                    </p>
                </div>
                <div class="col-4 text-end">
                    <button type="button" class="btn btn-success">Napisz</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form method="POST" action="{{ route('profile.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edycja profilu</p>
                                <button class="btn btn-primary btn-sm ms-auto" type="submit">Zapisz zmiany</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nazwa
                                            użytkownika</label>
                                        <input class="form-control" type="text" value="{{$user->name}}" name="username">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Adres e-mail</label>
                                        <input class="form-control" type="email" value="{{$user->email}}" name="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Imie i
                                            Nazwisko</label>
                                        <input class="form-control" type="text" value="{{ $user->profile->name }}"
                                               name="shownName">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">O mnie</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">O mnie</label>
                                        <input class="form-control" type="text"
                                               value="Tutaj będzie kiedyś cytat/biografia" name="aboutme">
                                    </div>
                                </div>
                            </div>
                            <p class="float-end">
                                <button type="button" class="btn btn-danger">Usuń konto</button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    @if ($user->profile->avatar)
                        <img src="{{ asset('storage/avatars/' . $user->profile->avatar) }}" alt="Image placeholder"
                             class="card-img-top">
                    @endif

                    <div class="card-body pt-0">
                        <div class="text-center mt-4">
                            <h5>
                                {{$user->profile->name}}
                            </h5>
                            <div class="h6 font-weight-300">
                                Rola
                            </div>
                            <div>
                                Może jakiś cytat lub coś
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form method="POST" action="{{ route('avatar.upload') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="avatar" class="mr-2">Wybierz plik:</label>
                                <input type="file" name="avatar" class="form-control-file mr-2" id="avatar">
                                <button type="submit" class="btn btn-primary float-end">Potwierdź zmianę</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('background')
    @include('layouts.background')
@endsection
