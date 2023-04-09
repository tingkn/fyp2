@extends('layouts.app')

@section('title', 'Plastic Recycle-It-Up')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Quiz</title>
</head>
<body>
@php
    $image = "bg5.jpg";
@endphp

<div class="header" style="background-image: url({{ asset('images/background/' . $image) }});   
                              background-size: cover;
                              background-position: center;
                              position: relative;">
    <h1>Result</h1>
  </div>
    <div class="result-screen">
        <h1>{{ $quiz->question }}</h1>
        <p>Your answer: {{ $quiz->{'opt'.$answer} }}</p>
        <p>Correct answer: {{ $quiz->{"opt".$quiz->answer} }}</p>
        @if ($isCorrect)
            <p class="correct">You are correct!</p>
        @else
            <p class="incorrect">Sorry, that was incorrect.</p>
        @endif
        <p><a href="{{ route('quizzes.index') }}">Back to Quiz List</a></p>
    </div>
</body>
</html>
@include('includes.footer')
@endsection
