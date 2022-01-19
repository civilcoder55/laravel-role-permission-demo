@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
<div class="container-fluid">
    <h1 class="dash-title">Edit User</h1>
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
                    <form method="POST" action="{{ route('admin.users.update',$user->id) }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>Save
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password (Leave blank if you don't want to update it.)</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password (Leave blank if you don't want to update it.)</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            @foreach ($roles as $role )
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="{{$role->name}}" value="{{$role->id}}" {{in_array($role->id, $user_roles_ids) ? 'checked' : ''}}  name='roles[]' @cannot('edit-user-role')
                                    disabled
                                @endcannot >
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
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection