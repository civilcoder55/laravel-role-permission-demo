@extends('layouts.app')
@section('title', 'Create User')

@section('content')
<div class="container-fluid">
    <h1 class="dash-title">Create New User</h1>
    @if (session('status'))
    <div class="row">
        <div class="col mt-3">
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-xl">
            <div class="card easion-card">
                <div class="card-header">
                    <div class="easion-card-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                </div>
                <div class="card-body ">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        @can('edit-user-role')
                        <div class="form-group">
                            @foreach ($roles as $role )
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="{{$role->name}}" value="{{$role->id}}" name='roles[]'>
                                <label class="custom-control-label" for="{{$role->name}}">{{$role->name}}</label>
                            </div>
                            @endforeach
                            @error('roles')
                            <input type="hidden" class="form-control @error('roles') is-invalid @enderror">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @endcan

                        <button type="submit" class="btn btn-primary">Create User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection