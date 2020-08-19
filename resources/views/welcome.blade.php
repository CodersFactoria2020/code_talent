@extends('home.homeStyle')
    <body>
        <div class="flex-center position-ref full-height">


            <div class="content">
                <div class="title m-b-md">
                    Peñascal F5
                </div>
                <div class="links">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
