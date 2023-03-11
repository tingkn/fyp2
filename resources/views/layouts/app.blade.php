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
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

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

<header class="{{ $url === url('/') ? 'heading' :
                    ($url === url('/WTRecycle') ? 'heading-wtr' :
                    ($url === url('/HTRecycle') ? 'heading-htr' :
                    ($url === url('/quiz') ? 'heading-quiz' :
                    ($url === url('/blog') ? 'heading-blog' :
                    '')))) }}">
  <div class="text-box">
    <h1 class="heading-primary">
        @if ($url === url('/'))
            Forum
        @elseif ($url === url('/quiz'))
            Quiz
        @elseif ($url === url('/blog'))
            Blog
        @elseif ($url === url('/WTRecycle'))
            Where to Recycle
        @elseif ($url === url('/HTRecycle'))
            How to Recycle
        @endif
    </h1>
  </div>
</header>

        {{-- Mobile header --}}
        <div class="d-sm-block d-md-none">
            <nav class="navbar navbar-dark bg-green">
                <span class="navbar-brand mb-0 h1">
                    {{ config('app.name', 'Plastic_Recycle_It_Up') }}
                </span>
            </nav>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Mobile Navbar -->
    @include('layouts.navbar.mobile')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>

</html>
