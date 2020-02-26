@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.messages')
    <div class="row">
        <div class="col-1"></div>
        <div class="col-3 p-5">
            @if($user->profile->image == NULL)
            <img src="{!! asset('storage/app/public/avatar2.png')  !!}" class="rounded-circle w-100">
            @else
            <img src="{!! asset('storage/app/public/'. $user->profile->image)  !!}" class="rounded-circle w-100">
            @endif

        </div>
        <div class="col-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex  align-items-center pb-3">
                    <div class="h3">{{$user->name}}</div>

                    <follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button>

                </div>

                @can('update', $user->profile)
                <a href="{{route('post.create')}}" class="btn btn-primary">Add New Post</a>
                @endcan

            </div>
            @can('update', $user->profile)
            <a href="{{route('profile.edit', $user->id)}}">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-4"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-4"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-4"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{   $user->profile->title ?? ''}}</div>
            <div>{{$user->profile->description ?? '' }}</div>
            <div><a href="#">{{  $user->profile->url ?? ''}}</a></div>
        </div>
    </div>
    <hr>
    <div class="row pt-4">
        @foreach($user->posts as $row)
        <div class="col-4 pb-4">
            <a href="{{route('post.show', $row->id)}}">
                <!-- <img src="{!! asset('public/images/posts/'.$row->image) !!} " class="w-100"> -->
                <img src="{!! asset('storage/app/public/'. $row->image)  !!}" class=" w-100">
            </a>
        </div>
        @endforeach
    </div>


</div>
@endsection