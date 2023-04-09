@extends('layouts.app')

@section('title', 'Your Posts')

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

            <div class="col-md-12 mb-3 mt-2">
                <a href="{{ route('post.create') }}" class="btn btn-outline-primary float-right">
                    <i class="fas fa-plus"></i>
                    Create New Post
                </a>
            </div>

            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Comments</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ ($posts->currentPage() - 1)  * $posts->links()->paginator->perPage() + $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('post.show', $post->slug) }}">{{ Str::limit($post->title, 100) }}</a>
                                    </td>
                                    <td>{{ $post->comments_count . ' ' . Str::plural('Comment', $post->comments_count) }}
                                    </td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('post.edit', $post->slug) }}"
                                            class="btn btn-outline-info btn-sm mb-1">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <div style="margin-left:8px;">
                                            <form action="{{ route('post.destroy', $post->slug) }}" method="POST"
                                                onsubmit="return confirm('Are you sure want to delete this post?')">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="slug" value="{{ $post->slug }}">
                                                <button type="submit" class="btn btn-outline-danger btn-xl">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">You don't have any posts yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 mb-5 mt-5">
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@else
    <!-- Redirect unauthenticated users to login page -->
    <div class="alert alert-danger">
        <p>You need to <a href="{{ route('login') }}">log in</a> to access this page.</p>
    </div>
@endif
@include('includes.footer')
@endsection
