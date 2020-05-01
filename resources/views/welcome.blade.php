<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>eMobilis Student Attendance System | HOME</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id==1)
                            <a href="{{ url('/admin') }}">Home</a>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->role_id==2)
                            <a href="{{ url('/lecturer') }}">Home</a>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->role_id==3)
                            @if(\Illuminate\Support\Facades\Auth::user()->is_active == 0)
                                <a href="{{ url('/') }}">No sufficient rights to access your dashboard</a>
                                <!-- Messages Dropdown Menu -->
                                <!-- Authentication Links -->
                                @guest
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                @else
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
                            @elseif(\Illuminate\Support\Facades\Auth::user()->is_active == 2)
                                <a href="{{ url('/') }}">You completed studies at eMobilis</a>
                                <!-- Messages Dropdown Menu -->
                                <!-- Authentication Links -->
                                @guest
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                @else
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
                            @elseif(\Illuminate\Support\Facades\Auth::user()->is_active==3)
                                <a href="{{ url('/') }}">You have been suspended</a>
                                <!-- Messages Dropdown Menu -->
                                <!-- Authentication Links -->
                                @guest
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                @else
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
                            @else
                                <a href="{{ url('/student') }}">Home</a>

                            @endif
                        @else
                                <a href="{{ url('/') }}">No sufficient rights to access your dashboard</a>
                                <!-- Messages Dropdown Menu -->
                                <!-- Authentication Links -->
                                @guest
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    @if (Route::has('register'))
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                @else
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
                            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                                <i class="fas fa-th-large"></i>
                            </a>
                        @endif
                    @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    eMobilis Students Attendance System
                </div>

                <div class="links">
{{--                    <a href="{{ url('/admin') }}">Administrator</a>--}}
{{--                    <a href="{{ url('/lecturer') }}">Lecturer</a>--}}
{{--                    <a href="{{ url('/student') }}">Student</a>--}}
                </div>
            </div>
        </div>
    </body>
</html>
