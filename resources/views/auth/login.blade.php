@extends('layouts.auth')
@section('title', 'Users | Login')
@section('content')
<div class="card account-dialog">
    <div class="card-header bg-primary text-white"> Please sign in </div>
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-Mail Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">Remember me</label>
                </div>
            </div>
            <div class="account-dialog-actions">
                <button type="submit" class="btn btn-primary">Login</button>
                <a class="account-dialog-link" href="{{ route('register') }}">Create a new account</a>
                <a class="account-dialog-link" href="{{ route('password.request') }}">Forgot your password?</a>
            </div>
        </form>
    </div>
</div>
@endsection