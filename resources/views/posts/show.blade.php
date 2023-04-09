@extends('layouts.app')

@section('title', $post->title)

@section('content')
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="header" style="background-image: url({{ asset('images/building.jpg') }})">
    <h1>{{ $post->title }}</h1>
</div>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-3 mt-5">
                @include('partials.alert')
            </div>
        </div>

        <div class="d-none d-md-block">
            <div class="row justify-content-center mt-0">
                <div class="col-md-1">
                    <div class="card">
                        <div class="card-body text-center">
                            <form action="{{ route('vote.store') }}" method="POST">
                                @csrf
                                @method('post')

                                <div class="{{ $hasVote == 'up' ? 'text-primary' : 'text-secondary' }}">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                                    <input type="hidden" name="type" value="1">

                                    <button
                                        class="btn btn-transparent p-1{{ $hasVote == 'up' ? ' text-primary' : ' text-secondary' }}"
                                        type="submit">
                                        <h5>{{ $post->up_votes_count }}</h5>
                                        <i class="fas fa-sort-up fa-3x"></i>
                                    </button>
                                </div>
                            </form>

                            <form action="{{ route('vote.store') }}" method="POST">
                                @csrf
                                @method('post')

                                <div class="{{ $hasVote == 'down' ? 'text-primary' : 'text-secondary' }}">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                                    <input type="hidden" name="type" value="0">

                                    <button
                                        class="btn btn-transparent p-1{{ $hasVote == 'down' ? ' text-primary' : ' text-secondary' }}"
                                        type="submit">
                                        <i class="fas fa-sort-down fa-3x"></i>

                                        <h5>{{ $post->down_votes_count }}</h5>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-11">
                    @include('posts.card.post-content', ['post' => $post])
                </div>
            </div>
        </div>
        @auth
        <div class="row justify-content-center mb-2 mt-3">
            <div class="col-md-12">
                <form action="{{ route('favorites.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <button type="submit" class="btn btn-primary">Add to Favorites</button>
                </form>
            </div>
        </div>
        @endauth

        <div class="row justify-content-center mb-5">
            <div class="col-md-12">
                <h4 class="mt-4">
                    Post a Comment
                </h4>
                @include('posts.form.comment', ['post' => $post])

                <h4 class="mt-4 mb-2">All Comments</h4>

                @include('posts.card.comment-and-reply', ['post' => $post])
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function getHashValue(key) {
            var matches = location.hash.match(new RegExp(key + '=([^&]*)'))
            return matches ? matches[1] : null;
        }

        const commentId = getHashValue('comment')
        const replyId = getHashValue('reply')

        if (replyId !== null) {
            document.getElementById('collapseReply-' + commentId).classList.add('show')
        }

        const element = document.getElementById(window.location.hash.substr(1))
        headlineElement(element)

        function headlineElement(element) {
            element.style.backgroundColor = '#f7f7f7'
            element.style.border = '2px solid #158cba'
            element.style.borderRadius = '5px'

            element.addEventListener('mouseover', function() {
                setInterval(() => {
                    this.style.backgroundColor = 'white'
                    this.style.border = '0'
                    this.style.borderRadius = '0'
                }, 1000)
            })
        }
    </script>
</body>
</html>
@include('includes.footer')

@endsection

@include('partials.trix-editor')
