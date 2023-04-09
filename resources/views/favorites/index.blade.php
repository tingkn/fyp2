@extends('layouts.app')

@section('title', 'My Favorites')

@section('content')
@if (Auth::check())
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('partials.alert')
            </div>

            <div class="col-md-12 mt-3">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                        @foreach ($favorites as $fav)
                             <tr>
                                <td>{{ $fav->id }}</td>
                                @php
                                    $post = DB::table('posts')
                                            ->join('favorites', 'posts.id', '=', 'favorites.post_id')
                                            ->select('posts.title', 'posts.slug')
                                            ->where('favorites.id', $fav->id)
                                            ->first();
                                @endphp
                                <td>
                                <a href="{{ route('post.show', $post->slug) }}">{{ Str::limit($post->title, 100) }}</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" 
                                            onclick="if(confirm('Are you sure you want to delete this post?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$fav->id}}').submit();
                                                    }">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <form id="delete-form-{{$fav->id}}" 
                                        action="{{route('favorites.destroy', $fav->id)}}"
                                        method="post">
                                        @csrf 
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @forelse ($favorites as $fav)
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">You don't have any favorites yet.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
                <div class="col-md-12 mb-2 mt-5">
                    <div class="d-flex justify-content-center">
                        {{ $favorites->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@include('includes.footer')
@else
    <!-- Redirect unauthenticated users to login page -->
    <div class="alert alert-danger">
        <p>You need to <a href="{{ route('login') }}">log in</a> to access this page.</p>
    </div>
@endif
@endsection
