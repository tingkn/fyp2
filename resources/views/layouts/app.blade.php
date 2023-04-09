<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootswatch-lumen.min.css') }}" rel="stylesheet">

    {{-- Custom CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('trix-editor')
</head>

<body>
    <div id="app">
        @include('includes.header')
        @php
          $url = url()->current();
        @endphp

<header class="col-md-12 {{ $url === url('/home') ? 'heading' :
                    ($url === url('/') ? 'heading-welcome' :
                    ($url === url('/WTRecycle') ? 'heading-wtr' :
                    ($url === url('/HTRecycle') ? 'heading-htr' :
                    ($url === url('/blog') ? 'heading-blog' :
                    ($url === url('/post') ? 'heading-1' :
                    ($url === url('/post/create') ? 'heading-1' :
                    ($url === url('/favorites') ? 'heading-1' :
                    ($url === url('/messages') ? 'heading-3' :
                    ($url === url('/messages/create') ? 'heading-3' :
                    ($url === url('/setting') ? 'heading-1' :
                    ($url === url('/quizzes') ? 'heading-post' :
                    ''))))))))))) }}">
    <div class="text-box">
      <h1 class="heading-primary">
            @if ($url === url('/home'))
                Forum
            @elseif ($url === url('/quiz'))
                Quiz
            @elseif ($url === url('/blog'))
                Blog
            @elseif ($url === url('/WTRecycle'))
                Where to Recycle
            @elseif ($url === url('/HTRecycle'))
                How to Recycle
            @elseif ($url === url('/post'))
                All Your Posts
            @elseif ($url === url('/favorites'))
                All Your Favorites
            @elseif ($url === url('/post/create'))
                Create Post
            @elseif ($url === url('/messages'))
                Chat
            @elseif ($url === url('/messages/create'))
                Chat
            @elseif ($url === url('/setting'))
                Setting
            @elseif ($url === url('/quizzes'))
                Quiz
            @endif
      </h1>
    </div>
    <div class="text-box welcome-box">
        <h1 class="heading-primary">
            @if ($url === url('/'))
                Recycle Today For A Better Tomorrow 
                    <br> 
                        <h4>CHECK WHAT YOU CAN DO!
                            <br><a href="{{ url('/HTRecycle') }}" class="button-primary">Learn More</a></br>
                        </h4>
                    </br>
            @endif
        </h1>
    </div>
</header>
            @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>

</html>
