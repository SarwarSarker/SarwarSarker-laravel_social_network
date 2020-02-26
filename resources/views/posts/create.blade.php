@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('partials.messages')
        <div class="col-md-8 pt-5 ">
            <div class="row justify-content-center">
                <h1>Add New Post</h1>
            </div>
            <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row pt-4">
                    <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('Post Caption') }}</label>

                    <div class="col-md-6">
                        <input id="caption" type="caption" class="form-control @error('caption') is-invalid @enderror"
                            name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Post Image') }}</label>

                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                            name="image" required autocomplete="current-image">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Add New Post
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection