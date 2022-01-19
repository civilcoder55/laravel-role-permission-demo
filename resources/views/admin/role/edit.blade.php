@extends('layouts.app')
@section('title', 'Edit Role')

@section('content')
<div class="container-fluid">
    <h1 class="dash-title">Edit Role</h1>
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
                    <form method="POST" action="{{ route('admin.roles.update',$role->id) }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $role->name }}" required autocomplete="name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @foreach ($permissions as $permission )
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="{{$permission->name}}" value="{{$permission->id}}" {{in_array($permission->id, $role_permissions_ids) ? 'checked' : ''}} name='permissions[]'>
                                <label class="custom-control-label" for="{{$permission->name}}">{{$permission->name}}</label>
                            </div>
                            @endforeach
                            @error('permissions')
                            <input type="hidden" class="form-control @error('permissions') is-invalid @enderror">
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Role</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection