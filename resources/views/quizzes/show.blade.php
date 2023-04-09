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
    <h1>{{ $quiz->question }}</h1>
  </div>
    <div class="quiz-screen">
        <h1>{{ $quiz->question }}</h1>
        <form method="POST" action="{{ route('quizzes.answer', $quiz) }}">
            @csrf
            <div class="quiz-slider">
                <div class="quiz-slide">
                    <div class="quiz-options">
                        <button type="submit" name="answer" value="1">{{ $quiz->opt1 }}</button>
                    </div>
                </div>
                <div class="quiz-slide">
                    <div class="quiz-options">
                        <button type="submit" name="answer" value="2">{{ $quiz->opt2 }}</button>
                    </div>
                </div>
                <div class="quiz-slide">
                    <div class="quiz-options">
                        <button type="submit" name="answer" value="3">{{ $quiz->opt3 }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
@include('includes.footer')
@endsection