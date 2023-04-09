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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Quiz List</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($quizzes as $quiz)
                        <li class="list-group-item">
                            <h5>{{ $quiz->question }}</h5>
                            <p>{{ $quiz->opt1 }}</p>
                            <p>{{ $quiz->opt2 }}</p>
                            <p>{{ $quiz->opt3 }}</p>
                            <a href="{{ route('quizzes.show', $quiz->id) }}" class="btn btn-primary">Take Quiz</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-12 mb-2 mt-5">
                    <div class="d-flex justify-content-center">
                        {{ $quizzes->links() }}
                    </div>
                </div>

        </div>
    </div>
</div>
</body>
</html>
@include('includes.footer')
@endsection