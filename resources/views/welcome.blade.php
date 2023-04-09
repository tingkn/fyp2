@extends('layouts.app')

@section('title', 'Plastic Recycle-It-Up')

@section('content')
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
<div class="row title-card">
  <div class="col-md-6 d-flex align-items-center">
    <div>
      <h1>If you care about the <strong><i>environment</i></strong> and how it will affect mankind, then recycling shouldn't take a second thought</h1>
      <button class="button-search"><a href="{{ url('/HTRecycle') }}">How To Recycle?</a></button>
    </div>
  </div>
  <div class="col-md-6 welcome-img">
    <img src="{{ asset('images/nature4.jpg') }}" class="img-fluid">
  </div>
  <div class="col-md-6">
    <img src="{{ asset('images/nature3.jpg') }}" class="img-fluid">
  </div>
  <div class="col-md-6 d-flex align-items-center">
    <div>
      <h1><strong><i>Plastic</strong></i> is a more destructive weapon than a nuclear bomb or an atom bomb, its impoact shall remain for centuries on the future generation</h1>
      <button class="button-search"><a href="{{ url('/home') }}">Where To Recycle?</a></button>
    </div>
  </div>
</div>  

<div class="col-md-12 title-card mt-5">
    <h1>Read Latest</h1>
    <h1><i><strong>Blogs</strong></i></h1>
</div>     

<div class="container"> 
  <div class="row">
    @foreach ($blogs as $blog)
    <div class="col-md-4 mb-4">
      <div class="blog-card-welcome">
        <img src="{{ asset('images/blog/' . $blog->image) }}" class="blog-card-welcome-img-top" alt="{{ $blog->title }}">
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
