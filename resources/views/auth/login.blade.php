@extends('layouts.auth')

@section('content')
    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
        <div class="card ">
            <div class="card-header pb-0 text-start">
                <h4 class="font-weight-bolder">Zaloguj się</h4>
                <p class="mb-0">Podaj email/login oraz hasło aby się zalogować</p>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <input name="login" type="text" class="form-control form-control-lg @error('login') is-invalid @enderror" placeholder="Email/Login" aria-label="Email" value="{{ old('login') }}" required autocomplete="login" autofocus>
                        @error('login')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input name="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="rememberMe">Pamiętaj hasło</label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Zaloguj się</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                    Nie masz konta ? 
                    <a href="{{url('register')}}" class="text-primary text-gradient font-weight-bold">Zarejestruj</a>
                </p>
            </div>
        </div>
    </div>


@endsection
