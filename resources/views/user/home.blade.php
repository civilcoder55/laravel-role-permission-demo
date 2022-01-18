@extends('layouts.app')
@section('title', 'Home')

@section('content')
<div class="container-fluid">
    <h1 class="dash-title">Public Albums</h1>
    <div class="row">
        @foreach ($albums as $album )
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <img class="card-img-top" src="{{$album->cover_image}}" alt="Card image cap">
                    <h5 class="card-title">{{$album->name}}</h5>
                    <p class="card-text">{{$album->description}}</p>
                    <a href="{{route('user.albums.show',$album->id)}}" class="card-link">Show Album</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if ($albums->hasPages())
    <div class="pagination">
        {{ $albums->links() }}
    </div>
    @endif
</div>
@endsection