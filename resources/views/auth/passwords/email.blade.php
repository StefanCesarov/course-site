@extends('layouts.app')

@section('content')
<div class="container">
    <div class="registration-form">




                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            Link za resetovanje lozinke je poslat na Vašu adresu.
                        </div>
                        @endif

                        <div class="form-group">
                            <h2 style="color: #5891ff;">Resetuj lozinku</h2>
                            <br>
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
                                <button type="submit" class="btn btn-block create-account">
                                    Resetuj lozinku
                                </button>

                        </div>
                    </form>
    </div>
</div>
@endsection
