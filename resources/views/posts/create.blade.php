@extends('layouts.app')

@section('title', 'Create New Post')

@section('content')
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 mb-4 mt-5">
                @include('partials.alert')

                {{-- card title and content of posts --}}
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                    id="title" value="{{ old('title') }}" placeholder="Create a title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>

                                <input id="content" value="{{ old('content') }}" type="hidden" name="content">
                                <trix-editor input="content"></trix-editor>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-outline-primary">
                                <i class="fas fa-paper-plane"></i>
                                Publish
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
