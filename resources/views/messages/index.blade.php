@extends('layouts.app')

@section('title', 'Plastic Recycle-It-Up')

@section('content')

<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Plastic Recycle-It-Up</title>
  </head>

  <body>
  <div class="container">
        <a href="{{ route('messages.create') }}" class="btn btn-primary mb-3 mt-2">Create Message</a>
        @if($messages->count() > 0)
            <table class="table">
                <thead>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span>Message</span>
                            <span class="float-right">Date</span>
                        </li>
                    </ul>
                </thead>
                <ul class="list-group">
                    @foreach($messages as $message)
                        <li class="list-group-item">
                            <span class="font-weight-bold">{{ $message->sender->name }}</span> 
                            <span class="float-right">{{ $message->created_at->format('M d, Y h:i A') }}</span>
                            <div class="col-md-10">{{ $message->content }}</div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-md-12 mb-5 mt-5">
                    <div class="d-flex justify-content-center">
                        {{ $messages->links() }}
                    </div>
                </div>
            </table>
        @else
            <p>You have no received messages.</p>
        @endif
    </div>
    </body>
</html>
@include('includes.footer')
@endsection