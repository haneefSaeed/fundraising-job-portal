@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center m-5">
        <div class="col-md-6 d-flex align-items-center" >
            <div class="row">
                <div class="row">
                    <h1>Bring a Change!</h1>
                </div>
                <div class="row">
                    <h4>Join the community of kindness!</h4>
                </div>
                <div class="row mt-3">
                <p>Already Registerd? <a href="{{route('login')}}" class="nounderline" style="color:#333; font-weight: bold">Login Here!</a> </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                {{--                        // Name--}}
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control
                                    @error('name')
                            is-invalid
@enderror" name="name" value="{{ old('name') }}"   autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                {{--                        //email--}}
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"   autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                {{--                        //username--}}
                <div class="row mb-3">
                    <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('username') }}</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"   autocomplete="username">

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                {{--                        //password--}}
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"   autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                {{--                        //confirm password--}}
                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"   autocomplete="new-password">
                    </div>
                </div>
{{--                hidden user type--}}

                        <input id="type_id" type="hidden" name="type_id" value="2">

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

@endsection
