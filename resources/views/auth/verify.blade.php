@extends('layouts.auth')
@section('title', 'Users | Verify')
@section('content')
<div class="card account-dialog">
    <div class="card-header bg-primary text-white"> Verify Your Email Address </div>
    <div class="card-body">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif
        Before proceeding, please check your email for a verification link.
        If you did not receive the email
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <div class="account-dialog-actions">
                <button type="submit" class="btn btn-primary">click here to request another</button>
            </div>
        </form>
    </div>
</div>
@endsection