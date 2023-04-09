@extends('layouts.app')

@section('title', 'Plastic Recycle-It-Up')

@section('content')
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <div class="header" style="background-image: url({{ asset('images/blog/' . $blog->image) }}); background-size: cover; background-position: center;">
    <h1>{{ $blog->title }}</h1>
  </div>
  
  <div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="col-md-12">
        <div class="cap">
          <h1 class="mt-2">{{ $blog->title }}</h1>
        </div>
      </div>
      <p>Published at: {{ $blog->created_at->format('Y-m-d') }}</p>      
      <div class="col-md-12">
        <hr>
      </div>
      <p>{!! $blog->content !!}</p>
    </div>
    <div class="col-md-3">
        @foreach ($related_blogs as $related)
          <div class="col-md-12 mb-4">
            <div class="blog-card">
              <img src="{{ asset('images/blog/' . $related->image) }}" class="blog-card-img-top-small" alt="{{ $related->title }}">
              <div class="card-body">
                <h5 class="card-title">{{ $related->title }}</h5>
                <a href="{{ route('blog.show', $related->title) }}" class="btn btn-primary">Read More</a>
              </div>
              <div class="card-footer">
                <small class="text-muted">{{ $related->created_at->format('F j, Y') }}</small>
              </div>
            </div>
          </div>
        @endforeach
    </div>
  </div>
</div>

</body>
</html>
@include('includes.footer')
@endsection