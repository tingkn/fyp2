@extends('layouts.app')

@section('title', 'Edit Post - ' . $post->title)

@section('content')
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="header" style="background-image: url({{ asset('images/background/bg10.jpg') }});   
                              background-size: cover;
                              background-position: center;
                              position: relative;">
    <h1>Edit Post</h1>
</div>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 mb-4 mt-5">
                @include('partials.alert')

                {{-- card title and content of posts --}}
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('post.update', $post->slug) }}" method="POST">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                    id="title" value="{{ old('title') ?? $post->title }}"
                                    placeholder="Title">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>

                                <input id="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('content') ?? $post->content }}" type="hidden"
                                    name="content">

                                <trix-editor input="content"></trix-editor>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-outline-primary">
                                <i class="fas fa-paper-plane"></i>
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@include('includes.footer')
@endsection

@include('partials.trix-editor')
