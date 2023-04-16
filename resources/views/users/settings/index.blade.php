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
    <div class="container mb-5">
        <div class="row justify-content-center">

            {{-- Profile --}}
            <div class="col-md-12 mt-5">        
                
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-3">
                        <h4>Profile</h5>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body pb-1">
                                <form action="{{ route('setting.ChangeProfile') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" name="name"
                                            value="{{ old('name') ?? auth()->user()->name }}" autocomplete="name"
                                            class="form-control @error('name') is-invalid @enderror" required>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" name="email"
                                            value="{{ old('email') ?? auth()->user()->email }}" autocomplete="email"
                                            class="form-control @error('email') is-invalid @enderror">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 my-3">
                <hr>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <h4>Change Password<h4>
                    </div>
                    <div class="col-md-9">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <form action="{{ route('setting.ChangePassword') }}" method="POST">
                                    @csrf
                                    @method('put')

                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input id="current_password" type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            name="current_password">

                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">New Password</label>

                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">

                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <form id="delete-form" action="{{ route('delete-profile') }}" method="post" class="mt-3">
                            @csrf
                            <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete Account</button>
                        </form>

                        <script>
                            function confirmDelete() {
                                if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
                                    document.getElementById('delete-form').submit();
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
@include('includes.footer')
@endsection
