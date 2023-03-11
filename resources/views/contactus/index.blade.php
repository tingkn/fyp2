@extends('layouts.contactApp')

@section('title', 'Plastic Recycle-It-Up')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-left">
          <a href="{{ route('home') }}"><i class="screen-header-button back"></i></a>
          <div class="screen-header-button maximize"></div>
          <div class="screen-header-button minimize"></div>
        </div>
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <span>CONTACT</span>
            <span>US</span>
          </div>
          <div class="app-contact">CONTACT INFO : +60 12 372 6621 </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('contactus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="screen-body-item">
          <div class="app-form">
            <div class="app-form-group">
                <input type="text" name="name" class="app-form-control" placeholder="NAME">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <input type="email" name="email" class="app-form-control" placeholder="EMAIL">
                @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                <input type="text" name="content" class="app-form-control" placeholder="MESSAGE">
                @error('content')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="app-form-group buttons">
                <button class="app-form-button" href="{{ route('contactus.store') }}">SEND</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
