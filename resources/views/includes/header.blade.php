<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<body>
<table width="100%" class="sample-section-wrap">
          <tbody>
            <tr>
              <td style="font-size: 30px; padding-left:10px;" width="30%"><a href="/">Plastic Recycle-It-Up</a></td>
              <td width="12%"><a href="{{ url('/HTRecycle') }}">How to Recycle</a></td>
              <td width="13%"><a href="{{ url('/WTRecycle') }}">Where to Recycle</a></td>
              <td width="7%"><a href="/home">Forum</a></td>
              <td width="6%"><a href="{{ url('/quizzes') }}">Quiz</a></td>
              <td width="16%"><a href="{{ url('/blog') }}">Blog</a></td>
              <td>
                @guest
                  @if (Route::has('login'))
                    <td>
                      <a class="nav-link{{ request()->routeIs('login') ? ' active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </td>
                  @endif
                  @if (Route::has('register'))
                    <td>
                      <a class="nav-link{{ request()->routeIs('register') ? ' active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </td>
                  @endif
                @else
                  <td>
                    <a class="nav-link" href="{{ url('/messages') }}">Chat</a> 
                  </td>
                  <td>
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      @if (auth()->user()->avatar)
                        <img src="{{ asset('storage/img/avatar/' . auth()->user()->avatar) }}" alt="Avatar" class="img-fluid rounded-circle mr-1" style="width: 20px; height: 20px; object-fit: cover;">
                      @else
                        <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(auth()->user()->email))) . '?s=' . 20 }}" alt="Avatar" width="20" class="img-fluid rounded-circle mr-1">
                      @endif
                      {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ url('/post') }}">
                        {{ __('My Post') }}
                      </a>
                      <a class="dropdown-item" href="{{ url('/favorites') }}">
                        {{ __('My Favorites') }}
                      </a>
                      <a class="dropdown-item" href="{{ route('setting.index') }}">
                        {{ __('Setting') }}
                      </a>
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </div>
                  </td>
                @endguest
              </td>
            </tr>
          </tbody>
        </table>
    </body>
</html>

