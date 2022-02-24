@extends('layouts.app')

@section('content')
<div class="container">

            <div class="registration-form">
                    <form method="POST" action="{{ route('login') }}">
                        <div class="form-icon">
                            <span><i class="icon icon-user"></i></span>
                        </div>
                        @csrf

                        <div class="form-group">
                                <input id="email" type="email" class="form-control item @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="password" type="password" class="form-control item @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Lozinka">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Zapamti me') }}
                                    </label>
                                </div>
                           </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-block create-account">
                                    {{ __('Uloguj se') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-block create-account" href="{{ route('password.request') }}">
                                        {{ __('Zaboravljena lozinka?') }}
                                    </a>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!--
<div class="registration-form">
        <form method="POST" action="{{ route('login') }}">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input id="email" type="email" class="form-control item @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email"> 

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control item @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Lozinka">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="form-group">

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    Zapamti me
                </label>
              </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Uloguj se</button>
            </div>
            <div class="form-group">
            @if (Route::has('password.request'))
                <a class="btn btn-block create-account" href="{{ route('password.request') }}">
                    {{ __('Zaboravljena lozinka?') }}
                </a>
            @endif
            </div>
        </form>
    </div>

</div>
        -->
</div>
@endsection
