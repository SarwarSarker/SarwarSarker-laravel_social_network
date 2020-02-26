@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-5">
        <div class="col-md-8">
            <img src="{!! asset('storage/app/public/'.$post->image) !!} " class="w-100">
        </div>
        <div class="col-md-4">
            <div class="d-flex align-items-center">
                <div class="pr-4">
                    @if($post->user->profile->image == NULL)
                    <img src="{!! asset('storage/app/public/avatar2.png')  !!}" class="rounded-circle w-100"
                        style="height:50px;">
                    @else
                    <img src="{!! asset('storage/app/public/'. $post->user->profile->image)  !!}"
                        class="rounded-circle w-100" style="height:50px;">
                    @endif
                </div>
                <div>
                    <div class="font-weight-bold">
                        <a href="{{route('profile.show',$post->user->id)}}">
                            <span class="text-dark">{{$post->user->name}}</span>
                        </a>
                        <a href="#" class="pl-3">Follow</a>
                    </div>
                </div>
            </div>
            <hr>


            <p>
                <span class="font-weight-bold">
                    <a href="{{route('profile.show',$post->user->id)}}">
                        <span class="text-dark">{{$post->user->name}}</span>
                    </a>
                </span>
                {{$post->caption}}
            </p>
        </div>
    </div>
</div>

@endsection