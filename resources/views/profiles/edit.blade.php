@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('partials.messages')
        <div class="col-md-8 pt-5 ">
            <div class="row justify-content-center">
                <h1>Edit Post</h1>
            </div>
            <form method="POST" action="{{ route('profile.update',$user->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div class="form-group row pt-4">
                    <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="title" class="form-control @error('title') is-invalid @enderror"
                            name="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title"
                            autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description"
                        class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

                    <div class="col-md-6">
                        <input id="description" type="description"
                            class="form-control @error('description') is-invalid @enderror" name="description"
                            value="{{ old('description') ?? $user->profile->description }}" autocomplete="description"
                            autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('Url') }}</label>

                    <div class="col-md-6">
                        <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url"
                            value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>

                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>

                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                            name="image" autocomplete="current-image">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            Save Profile
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection