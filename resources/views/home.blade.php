@extends('layouts.app')

@section('title', 'Plastic Recycle-It-Up')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-3">
                <form action="/home" method="GET" class="row">
                    <input type="text" id="searchInput" class="form-control" name="search" placeholder="Search...">
                </form>
            </div>

            <div class="col-md-12">
                <hr>
            </div>

            <div class="col-md-12">
                <h4 class="mt-2">All Posts</h4>
            </div>

            @forelse ($posts as $post)
                <div class="col-md-12 mb-4">
                    <a href="{{ route('post.show', $post->slug) }}" class="text-dark text-decoration-none">
                        <div class="card card-hover shadow-sm">
                            <div class="card-header">
                                <small>
                                    <span class="font-weight-bold">
                                        @if ($post->author->avatar)
                                            <img src="{{ asset('storage/img/avatar/' . $post->author->avatar) }}"
                                                alt="Avatar" class="img-fluid rounded-circle"
                                                style="width: 16px; height: 16px; object-fit: cover;">
                                        @else
                                            <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($post->author->email))) . '?s=' . 15 }}"
                                                alt="Avatar" width="15" class="img-fluid rounded-circle">
                                        @endif

                                        {{ $post->author->name }}
                                        -
                                        {{ $post->created_at->diffForHumans() }}
                                    </span>

                                    <span class="text-secondary">
                                        {{ $post->created_at != $post->updated_at ? '(edited)' : '' }}
                                    </span>
                                </small>

                                <small class="float-right text-secondary">
                                    {{ $post->comments_count . ' ' . Str::plural('Comment', $post->comments_count) }}
                                </small>

                                <br>

                                {{ Str::limit($post->title, 100) }}
                            </div>

                            <div class="card-body">
                                {!! Str::limit($post->content, 400) !!}
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        Posts not found.
                    </div>
                </div>
            @endforelse

            <div class="col-md-8 mb-5">
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@include('includes.footer')
@endsection
