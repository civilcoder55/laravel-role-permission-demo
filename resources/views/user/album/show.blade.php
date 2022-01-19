@extends('layouts.app')
@section('title', 'Album')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-xl">
            <div class="card easion-card">
                <div class="card-header">
                    <div class="easion-card-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>

                    <div class="easion-card-title"> Album Name : {{$album->name}} </div>
                </div>
                <div class="card-body ">
                    <img class="card-img-top" style="object-fit: contain;" height="500px" width="500px" src="{{$album->cover_image}}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Description : {{$album->description}}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card easion-card">
                <div class="card-header">
                    <div class="easion-card-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>

                    <div class="easion-card-title"> Album Images </div>
                </div>
                <div class="card-body ">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($album->images as $i => $image )
                            <li data-target="#carousel" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : "" }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($album->images as $i => $image)
                            <div class="carousel-item {{ $i == 0 ? "active" : "" }}">
                                <img src="{{ $image->url }}" class="d-block w-100">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection