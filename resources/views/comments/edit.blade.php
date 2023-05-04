@extends('layouts.app')

@section('title', 'Edit comment')

@section('content')
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="header" style="background-image: url({{ asset('images/nature8.jpg') }})">
    <h1>Edit comment</h1>
</div>

    <div class="container">
        <div class="row justify-content-center col-md-12">
                @include('partials.alert')

                {{-- card title and content of comments --}}
                <div class="card shadow-sm col-md-12 mt-5">
                    <div class="card-body">
                        <form action="{{ route('comment.update', $comment->id) }}" method="POST">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label for="body">Comment</label>

                                <input id="body" value="{{ old('body') ?? $comment->body }}" type="hidden" name="body">
                                <trix-editor input="body"></trix-editor>

                                @error('body')
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
