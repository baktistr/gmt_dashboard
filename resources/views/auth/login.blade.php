@extends('layouts.login')

@section('title')
    Login
@endsection

@section('content')
    <div class="container">
        <div class="d-flex row align-items-center justify-content-center" style="height: 100vh">
            <div class="col-md-8">
                <div class="card-group shadow">
                    <div class="card p-4" style="height : 400px ;">
                        <div class="card-body">
                            <h1 class="mb-4 mt-4">Dashboard</h1>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}"
                                        name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked">
                                                </use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input class="form-control" type="password" placeholder="{{ __('Password') }}"
                                        name="password" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn text-white font-weight-bold px-4" type="submit" style="background-color : #f21603 ">{{ __('Login') }}</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card text-white bg-white py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div class="text-center mt-5">
                            <img class="img-fluid" src="{{ asset('img/telkom-logo.svg') }}" height="40" alt="{{ config('app.name') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
