@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row dash-row">
        <div class="col-xl-4">
            <div class="stats stats-primary">
                <h3 class="stats-title"> Users </h3>
                <div class="stats-content">
                    <div class="stats-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="stats-data">
                        <div class="stats-number">{{$statistics['users_count']}}</div>
                        <div class="stats-change">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="stats stats-success ">
                <h3 class="stats-title"> Albums </h3>
                <div class="stats-content">
                    <div class="stats-icon">
                        <i class="fas fa-cart-arrow-down"></i>
                    </div>
                    <div class="stats-data">
                        <div class="stats-number">{{$statistics['albums_count']}}</div>
                        <div class="stats-change">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="stats stats-danger">
                <h3 class="stats-title"> Open tickets </h3>
                <div class="stats-content">
                    <div class="stats-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="stats-data">
                        <div class="stats-number">5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection