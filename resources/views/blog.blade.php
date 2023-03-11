@extends('layouts.app')

@section('title', 'Plastic Recycle-It-Up')

@section('content')
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
<div class="container">
  <div class="row">
    @foreach ($blogs as $blog)
    <div class="col-md-4 mb-4">
      <div class="card">
        @php
          $image = "";
          switch ($blog->id) { 
            case (1):
              $image = "bottles.jpg";
              break;
            case (2):
              $image = "bottles.jpg";
              break;
            case (3):
              $image = "plastics.jpg";
              break;
            default:
              $image = "furniture.jpg";
          }
        @endphp
        <img src="{{ asset('images/' . $image) }}" class="card-img-top" alt="{{ $blog->title }}">
        <div class="card-body">
          <h5 class="card-title">{{ $blog->title }}</h5>
          <p class="card-text">{{ substr(strip_tags($blog->content), 0, 100) }}...</p>
          <a href="{{ route('blog.show', $blog->title) }}" class="btn btn-primary">Read More</a>
        </div>
        <div class="card-footer">
          <small class="text-muted">{{ $blog->created_at->format('F j, Y') }}</small>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</body>
</html>
@include('includes.footer')
@endsection
