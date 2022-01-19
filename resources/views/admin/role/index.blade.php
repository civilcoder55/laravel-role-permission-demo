@extends('layouts.app')
@section('title', 'Roles')

@section('content')
<div class="container-fluid">
    <h1 class="dash-title">All Roles</h1>
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
        <div class="col-lg">
            <div class="card easion-card">
                <div class="card-header">
                    <div class="easion-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-secondary btn-sm album-create-btn href-btn">Create New Role</i></a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Permissions</th>
                                <th scope="col">Created Time</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    @foreach ($role->permissions as $permission )
                                    <span class="badge badge-pill badge-primary">{{$permission->name}}</span>
                                    @endforeach
                                </td>
                                <td>{{$role->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{ route('admin.roles.edit',$role->id) }}" class="btn btn-secondary btn-sm href-btn" title="edit role"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-secondary btn-sm" title="delete role" onclick="confirm('Are you sure to delete this role?') && document.getElementById('delete-role-{{$role->id}}').submit();"><i class="fas fa-trash"></i></button>

                                    <form id="delete-role-{{$role->id}}" action="{{ route('admin.roles.destroy',$role->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if ($roles->hasPages())
    <div class="pagination">
        {{ $roles->links() }}
    </div>
    @endif
</div>
@endsection