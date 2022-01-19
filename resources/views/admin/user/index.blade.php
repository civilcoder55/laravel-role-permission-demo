@extends('layouts.app')
@section('title', 'Users')

@section('content')
<div class="container-fluid">
    <h1 class="dash-title">All Users</h1>
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
                    <a href="{{ route('admin.users.create') }}" class="btn btn-secondary btn-sm album-create-btn href-btn">Create New User</i></a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Created Time</th>
                                <th scope="col">Updated Time</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @foreach ($user->roles as $role )
                                    <span class="badge badge-pill badge-primary">{{$role->name}}</span>
                                    @endforeach
                                </td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-secondary btn-sm href-btn" title="edit user"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-secondary btn-sm" title="delete user" onclick="confirm('Are you sure to delete this user?') && document.getElementById('delete-user-{{$user->id}}').submit();"><i class="fas fa-trash"></i></button>

                                    <form id="delete-user-{{$user->id}}" action="{{ route('admin.users.destroy',$user->id) }}" method="POST" class="d-none">
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
    @if ($users->hasPages())
    <div class="pagination">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection