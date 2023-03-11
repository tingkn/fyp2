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
  <div class="header" style="background-image: url({{ asset('images/' . $image) }})">
    <h1>{{ $blog->title }}</h1>
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <p>{{ $blog->content }}</p>
        <small>{{ $blog->created_at }}</small>
      </div>
    </div>
  </div>
  
  @include('includes.footer')
</body>
</html>
@endsection
