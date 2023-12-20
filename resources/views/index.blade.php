@extends('layouts.template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/indexHeaders.css') }}">
@endsection

@section('title')
    @jaknaweby
@endsection

@section('content')
    <header style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), linear-gradient(rgba(0, 48, 75, 0.5), rgba(76, 0, 5, 0.5)), url('img/code_background.png');"
    class="w-full h-screen bg-cover bg-fixed text-white relative    px-10 sm:px-14 md:px-20 lg:px-24 xl:px-28 2xl:px-32">
        <nav class="flex justify-between items-center relative   pt-10 sm:pt-12 md:pt-14 lg:pt-16 xl:pt-20 2xl:pt-24">
            <a href="#"><img src="{{ asset('img/jaknaweby_logo.png') }}" class="w-24" alt="@jaknaweby logo"></a>
            <ul id="links" class="font-extralight text-xl hidden justify-between flex-col bg-stone-950 sm:flex-row sm:w-1/2 sm:bg-transparent">
                <li class="pl-10 py-7 border-t sm:p-0 sm:border-0"><a href="#socials">Sociální sítě</a></li>
                <li class="pl-10 py-7 border-y sm:p-0 sm:border-0"><a href="#">Mám zájem o web</a></li>
                <li class="pl-10 py-7 border-b sm:p-0 sm:border-0"><a href="{{ route('tutorials') }}">Tutorialy</a></li>
            </ul>
            <img src="{{ asset('img/hamburger.png') }}" class="sm:hidden w-16" id="hamburger" alt="">
        </nav>

        <h1 class="text-4xl font-bold absolute bottom-1/3 leading-tight">Naučte se tvořit weby<br>zábavně a jednoduše</h1>
    </header>

    <main class="px-10 sm:px-14 md:px-20 lg:px-24 xl:px-28 2xl:px-32">
        <h2 class="text-4xl mx-auto mt-36">Kdo jsme a co děláme</h2>
        <div class="flex items-center justify-between mt-24">
            <p class="sm:w-2/3 text-xl font-extralight">Jsme dva kluci, které baví tvorba webů a pomáhání lidem. Projekt @jaknaweby vznikl za účelem vytvořit komunitu CZ/SK web developerů, kteří si navzájem pomohou efektivně se učit a řešit errory a bugy.</p>
            <img class="w-1/5 hidden sm:inline-block" src="{{ asset('img/jaknaweby_logo.png') }}" alt="@jaknaweby logo">
        </div>
        
        <h2 class="text-4xl mx-auto mt-36" id="socials">Naše sociální sítě</h2>
        <div class="flex flex-row-reverse items-center justify-between mt-28">
            <div class="flex flex-col justify-center w-full sm:w-2/3 font-extralight text-xl">
                <h3 class="text-3xl font-light">Instagram</h3>
                <p class="my-6">Jsme dva kluci, které baví tvorba webů a pomáhání lidem. Projekt @jaknaweby vznikl za účelem vytvořit komunitu CZ/SK web developerů, kteří si navzájem pomohou efektivně se učit a řešit errory a bugy.</p>
                <div class="flex">
                    <a href="#" class="bg-slate-200 px-8 py-2.5 rounded-md mr-2.5">Více informací</a>
                    <a href="https://www.instagram.com/jaknaweby" class="bg-slate-200 px-8 py-2.5 rounded-md">Odkaz na síť</a>
                </div>
            </div>
            <img class="w-1/5 h-fit hidden sm:inline-block" src="{{ asset('img/instagram_logo.png') }}" alt="instagram logo">
        </div>

        <div class="flex items-center justify-between mt-28">
            <div class="flex flex-col justify-center w-full sm:w-7/12 font-extralight text-xl">
                <h3 class="text-3xl font-light">Discord server</h3>
                <p class="my-6">Jsme dva kluci, které baví tvorba webů a pomáhání lidem. Projekt @jaknaweby vznikl za účelem vytvořit komunitu CZ/SK web developerů, kteří si navzájem pomohou efektivně se učit a řešit errory a bugy.</p>
                <div class="flex">
                    <a href="#" class="bg-slate-200 px-8 py-2.5 rounded-md mr-2.5">Více informací</a>
                    <a href="https://dsc.gg/jaknaweby" class="bg-slate-200 px-8 py-2.5 rounded-md">Odkaz na síť</a>
                </div>
            </div>
            <img class="w-1/5 h-fit hidden sm:inline-block" src="{{ asset('img/discord_logo.png') }}" alt="discord logo">
        </div>

        <div class="flex flex-row-reverse items-center justify-between mt-28">
            <div class="flex flex-col justify-center w-full sm:w-7/12 font-extralight text-xl">
                <h3 class="text-3xl font-light">YouTube</h3>
                <p class="my-6">Jsme dva kluci, které baví tvorba webů a pomáhání lidem. Projekt @jaknaweby vznikl za účelem vytvořit komunitu CZ/SK web developerů, kteří si navzájem pomohou efektivně se učit a řešit errory a bugy.</p>
                <div class="flex">
                    <a href="#" class="bg-slate-200 px-8 py-2.5 rounded-md mr-2.5">Více informací</a>
                    <a href="https://www.youtube.com/jaknaweby" class="bg-slate-200 px-8 py-2.5 rounded-md">Odkaz na síť</a>
                </div>
            </div>
            <img class="w-1/5 h-fit hidden sm:inline-block" src="{{ asset('img/youtube_logo.png') }}" alt="youtube logo">
        </div>

        <div class="flex items-center justify-between mt-28">
            <div class="flex flex-col justify-center w-full sm:w-7/12 font-extralight text-xl">
                <h3 class="text-3xl font-light">TikTok</h3>
                <p class="my-6">Jsme dva kluci, které baví tvorba webů a pomáhání lidem. Projekt @jaknaweby vznikl za účelem vytvořit komunitu CZ/SK web developerů, kteří si navzájem pomohou efektivně se učit a řešit errory a bugy.</p>
                <div class="flex">
                    <a href="#" class="bg-slate-200 px-8 py-2.5 rounded-md mr-2.5">Více informací</a>
                    <a href="https://tiktok.com/@jaknaweby" class="bg-slate-200 px-8 py-2.5 rounded-md">Odkaz na síť</a>
                </div>
            </div>
            <img class="w-1/5 h-fit hidden sm:inline-block" src="{{ asset('img/tiktok_logo.png') }}" alt="tiktok logo">
        </div>
    </main>
@endsection

@section('script')
    <script>
        let hamburger = document.querySelector("#hamburger");
        let navbar = document.querySelector("#links");
        let turnedOn = false;
        
        hamburger.addEventListener("click", function() {
            if (!turnedOn) {
                navbar.style.display = "flex";
                hamburger.src = "img/cross.jpg";
            } else {
                navbar.style.display = "";
                hamburger.src = "img/hamburger.png"
            }

            turnedOn = !turnedOn
        });
    </script>
@endsection