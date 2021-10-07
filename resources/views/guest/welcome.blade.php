<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BoolBnb</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        {{-- maps --}}
        <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/maps/maps.css'>
        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/maps/maps-web.min.js"></script>
        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/services/services-web.min.js"></script>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                {{-- <div class="m-3 text-right">
                    @auth
                        <a href="{{ route('userreg.home') }}" class="btn btn-outline-secondary">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
                        @endif
                    @endauth
                </div> --}}
            @endif

        </div>
        
        <div id="root">
            <router-view></router-view>
        </div>

        <script src="{{ asset('js/front.js') }}"></script>
    </body>
</html>
