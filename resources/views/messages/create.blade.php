@extends('layouts.app')

@section('title', 'Plastic Recycle-It-Up')

@section('content')

<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Plastic Recycle-It-Up</title>
</head>
<body>
<div class="container">
    <h1>New Message</h1>
    <form action="{{ route('messages.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="content">Message:</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
</body>
</html>
@include('includes.footer')
@endsection
