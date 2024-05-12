@extends('layouts.template')

@section('title')
    České tutorialy o tvorbě webů
@endsection

@section('content')
    @include('includes.navbar')
    
    <div class="my-14">
        <h1 class="text-center text-3xl font-bold">České tutorialy o tvorbě webů</h1>
        <p class="text-center mt-2">Na naší platformě najdete tutorialy o základních jazycích pro tvorbu webových stránek</p>
    </div>

    <div class="w-full bg-red-500 text-white">
        <div class="w-8/12 py-10 mx-auto">
            <h2 class="text-2xl mb-2 font-bold">HTML</h2>
    
            <ul class="mb-6 font-light">
                <li>
                    HTML je značkovací jazyk používaný pro strukturu a prezentaci obsahu na webových stránkách.
                </li>
                <li>
                    Definuje, jak mají být prvky (např. nadpisy, odkazy, obrázky) uspořádány na stránce.
                </li>
                <li>
                    Používá značky (tagy) k označení různých částí obsahu.
                </li>
            </ul>
    
            <a href="{{ route('tutorials') }}/html" class="bg-white text-red-700 px-6 py-2 rounded">Začněte se učit</a>
        </div>
    </div>

    <div class="w-full bg-blue-500 text-white">
        <div class="w-8/12 py-10 mx-auto">
            <h2 class="text-2xl mb-2 font-bold">CSS</h2>
            
            <ul class="mb-6 font-light">
                <li>
                    CSS popisuje, jak mají být HTML prvky zobrazeny na obrazovce, papíře nebo v jiných médiích.
                </li>
                <li>
                    Umožňuje nastavit barvy, fonty, okraje a další vizuální vlastnosti.
                </li>
                <li>
                    Odděluje prezentaci od struktury (oddělení zájmů).
                </li>
            </ul>
    
            <a href="{{ route('tutorials') }}/css" class="bg-white text-blue-700 px-6 py-2 rounded">Začněte se učit</a>
        </div>
    </div>

    <div class="w-full bg-amber-500 text-white">
        <div class="w-8/12 py-10 mx-auto">
            <h2 class="text-2xl mb-2 font-bold">JavaScript</h2>
    
            <ul class="mb-6 font-light">
                <li>
                    JavaScript je skriptovací jazyk používaný pro přidávání dynamických prvků na webové stránky.
                </li>
                <li>
                    Umožňuje interaktivitu, animace, validaci formulářů a další funkce.
                </li>
                <li>
                    Běží na straně klienta (v prohlížeči).
                </li>
            </ul>
            
            <a href="{{ route('tutorials') }}/javascript" class="bg-white text-amber-700 px-6 py-2 rounded">Začněte se učit</a>
        </div>
    </div>

    <div class="w-full bg-indigo-500 text-white">
        <div class="w-8/12 py-10 mx-auto">
            <h2 class="text-2xl mb-2 font-bold">PHP</h2>
            
            <ul class="mb-6 font-light">
                <li>
                    PHP je serverový skriptovací jazyk.
                </li>
                <li>
                    Používá se pro zpracování dat na serveru, např. pro generování dynamických stránek.
                </li>
                <li>
                    Často se používá s databázemi (např. MySQL) k ukládání a získávání informací.
                </li>
            </ul>
            
            <a href="{{ route('tutorials') }}/php" class="bg-white text-indigo-700 px-6 py-2 rounded">Začněte se učit</a>
        </div>
    </div>

    <div class="w-full bg-orange-500 text-white">
        <div class="w-8/12 py-10 mx-auto">
            <h2 class="text-2xl mb-2 font-bold">SQL</h2>
            
            <ul class="mb-6 font-light">
                <li>
                    SQL je jazyk pro práci s relačními databázemi.
                </li>
                <li>
                    Slouží k vytváření, dotazování a úpravám dat v tabulkách.
                </li>
                <li>
                    Používá se spolu s PHP pro ukládání a získávání informací na webových stránkách.
                </li>
            </ul>
            
            <a href="{{ route('tutorials') }}/sql" class="bg-white text-orange-700 px-6 py-2 rounded">Začněte se učit</a>
        </div>
    </div>
@endsection

@section('auth-margin')
    !m-0
@endsection