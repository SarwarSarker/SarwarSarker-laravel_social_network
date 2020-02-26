@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.messages')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-3 p-5">
            <img src="public/images/facegram.png" class="rounded-circle">

        </div>
        <div class="col-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{Auth::user()->name}}</h1>
                <a href="" class="btn btn-info">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-4"><strong>{{Auth::user()->posts()->count()}}</strong> posts</div>
                <div class="pr-4"><strong>23k</strong> followers</div>
                <div class="pr-4"><strong>215</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold"></div>
            <div></div>
            <div><a href="#"></a></div>
        </div>
    </div>

    <div class="row pt-5">
        <div class="col-4"><img src="public/images/1.jpg" class="w-100" style="height:350px; "></div>
        <div class="col-4"><img src="public/images/2.jpg" class="w-100" style="height:350px; "></div>
        <div class="col-4"><img src="public/images/3.jpg" class="w-100" style="height:350px; "></div>
    </div>

</div>
@endsection