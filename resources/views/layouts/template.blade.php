<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="icon" href="{{ asset('img/jaknaweby_logo.png') }}">
    @livewireScripts
    @yield('css')
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')

    <div style="margin-top: auto;" class="@yield('auth-margin')"></div>
    <footer class="text-white bg-stone-950 py-16 px-10 mt-36 sm:px-14 md:px-20 lg:px-24 xl:px-28 2xl:px-32 @yield('auth-margin')">
        <ul class="flex justify-center mx-auto mb-7">
            <li class="w-16 mr-3"><a href="https://www.instagram.com/jaknaweby/"><img src="{{ asset('img/instagram_logo.png') }}" alt="instagram logo"></a></li>
            <li class="w-16 mr-3"><a href="https://dsc.gg/jaknaweby"><img src="{{ asset('img/discord_logo.png') }}" alt="discord logo"></a></li>
            <li class="w-16 mr-3"><a href="https://www.youtube.com/jaknaweby"><img src="{{ asset('img/youtube_logo.png') }}" alt="youtube logo"></a></li>
            <li class="w-16"><a href="https://tiktok.com/@jaknaweby"><img src="{{ asset('img/tiktok_logo.png') }}" alt="tiktok logo"></a></li>
        </ul>
        <p class="font-extralight text-center text-xl">© 2024 @jaknaweby</p>
    </footer>

    @yield('script')
</body>
</html>