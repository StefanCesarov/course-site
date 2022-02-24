@extends('layouts.app')

@section('content')
<div class="container">
    <div class="registration-form">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <h2 style="color: #5891ff;">Resetuj lozinku</h2>
                            <br>
                        </div>

                        <div class="form-group">
                                <input id="email" type="email" class="form-control item @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="password" type="password" class="form-control item @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Lozinka">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control item" name="password_confirmation" required autocomplete="new-password" placeholder="Potvrdi Lozinku">
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-block create-account">
                                    {{ __('Reset Password') }}
                                </button>
                        </div>
                    </form>

    </div>
</div>
@endsection
