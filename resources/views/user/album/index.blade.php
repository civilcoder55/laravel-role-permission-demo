@extends('layouts.app')
@section('title', 'Albums')

@section('content')
<div class="container-fluid">
    <h1 class="dash-title">My Albums</h1>
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
                    <div class="easion-card-title">All Albums</div>
                    <a href="{{ route('user.albums.create') }}" class="btn btn-secondary btn-sm album-create-btn href-btn">Create New Album</i></a>
                </div>
                <div class="card-body table-responsive">
                    @if (count($albums) > 0 )
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Private</th>
                                <th scope="col">Created Time</th>
                                <th scope="col">Updated Time</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($albums as $album)
                            <tr>
                                <td>{{$album->id}}</td>
                                <td>{{$album->name}}</td>
                                <td>{{$album->description}}</td>
                                <td><input type="checkbox" {{ $album->private ? 'checked' : '' }} disabled></td>
                                <td>{{$album->created_at->diffForHumans()}}</td>
                                <td>{{$album->updated_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{ route('user.albums.edit',$album->id) }}" class="btn btn-secondary btn-sm href-btn" title="edit album"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-secondary btn-sm" title="delete album" onclick="document.getElementById('delete-album-{{$album->id}}').submit();"><i class="fas fa-trash"></i></button>

                                    <form id="delete-album-{{$album->id}}" action="{{ route('user.albums.destroy',$album->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    No Albums Yet
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection