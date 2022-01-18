@extends('layouts.auth')
@section('title', 'Users | Confirm Password')
@section('content')
<div class="card account-dialog">
    <div class="card-header bg-primary text-white"> Please confirm your password before continuing. </div>
    <div class="card-body">
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
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
                <button type="submit" class="btn btn-primary">Confirm Password</button>
                <a class="account-dialog-link" href="{{ route('password.request') }}">Forgot your password?</a>
            </div>
        </form>
    </div>
</div>
@endsection