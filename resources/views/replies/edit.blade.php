@extends('layouts.app')

@section('title', 'Edit Reply')

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
    <h1>Edit Reply</h1>
</div>

    <div class="container">
        <div class="row justify-content-center col-md-12">
                @include('partials.alert')

                {{-- card title and content of reply --}}
                <div class="card shadow-sm col-md-12 mt-5">
                    <div class="card-body">
                        <form action="{{ route('reply.update', $reply->id) }}" method="POST">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label for="reply">Reply</label>

                                <input id="reply" value="{{ old('reply') ?? $reply->body }}" type="hidden" name="reply">
                                <trix-editor input="reply"></trix-editor>

                                @error('reply')
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
@include('includes.footer')

@endsection

@include('partials.trix-editor')
