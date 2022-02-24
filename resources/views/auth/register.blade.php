@extends('layouts.app')

@section('content')
<div class="container">

    <!--  stara form -->
    
            <div class="registration-form">
                <div class="form-icon">
                    <span><i class="icon icon-user"></i></span>
                </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            
                                <input id="name" type="text" class="form-control item @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Ime">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                        </div>

                        <div class="form-group">
                       
                                <input id="email" type="email" class="form-control item @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">

                            
                                <input id="password" type="password" class="form-control item @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="Lozinka">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            
                                <input id="password-confirm" type="password" class="form-control item " name="password_confirmation"  autocomplete="new-password" placeholder="Potvrdi lozinku">
                            
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-block create-account">
                                    {{ __('Registruj se') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!--  stara forma-->
<!---nova forma 
    <div class="registration-form">
        <form method="POST" action="{{ route('register') }}">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input id="name" type="text" class="form-control item @error('name') is-invalid @enderror"  placeholder="Ime" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                
            </div>
            <div class="form-group">
                <input type="email" class="form-control item @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                <button type="submit" class="btn btn-block create-account">Regustruj se</button>
            </div>
        </form>
    </div>
    -->
</div>

@endsection
