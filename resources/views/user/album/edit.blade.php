@extends('layouts.app')
@section('title', 'Edit Album')

@section('content')
<div class="container-fluid">
    <h1 class="dash-title">Edit Album</h1>
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
                    <form method="POST" action="{{ route('user.albums.update',$album->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Album Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $album->name}}" required autocomplete="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Album Description</label>
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') ?? $album->description}}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cover">Album Cover Image</label>
                            <div class="custom-file">
                                <input type="file" name="cover" class="custom-file-input form-control @error('cover') is-invalid @enderror" accept=".jpeg,.png,.jpg" id="cover" style="visibility:hidden;">
                                <label class="custom-file-label" for="cover" id="cover-label">Choose file</label>
                                @error('cover')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="preview">
                                <img src='{{$album->cover_image}}' height="500px" width="500px" id="preview" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="private" name='private' {{ old('private') || $album->private ? 'checked' :''}}>
                                <label class="custom-control-label" for="private">Make Album Private</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Album</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection