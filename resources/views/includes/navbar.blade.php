<header class="sticky top-0">
    <nav class="w-full bg-stone-950 flex items-center justify-center h-12 relative">
        <ul class="flex text-white items-center text-xl h-full">
            @if(in_array($article->language, ["html", "css", "javascript", "php", "sql"]))
                <div class="absolute top-0 left-0 flex h-full">
                    <li>
                        <a class="h-full px-6 flex items-center bg-neutral-800/30 hover:bg-neutral-800" id="hamburger">
                            <img src="{{ asset('img/hamburger.png') }}" alt="hamburger icon" class="h-1/2" id="hamburger-logo">
                        </a>
                    </li>
                </div>
            @endif

            <li class="h-full">
                <a href="{{ route('tutorials') }}" class="h-full px-6 flex items-center @if($article->language != "") bg-neutral-800/30 hover:bg-neutral-800 @else bg-neutral-800 @endif"><img src="{{ asset('img/home.png') }}" alt="home icon" class="h-1/2"></a>
            </li>

            <li class="h-full">
                <a href="{{ route('tutorials') }}/html" class="font-light py-auto h-full px-6 flex items-center @if($article->language != "html") bg-red-600/20 hover:bg-red-600 @else bg-red-600 @endif">
                    HTML
                </a>
            </li>

            <li class="h-full">
                <a href="{{ route('tutorials') }}/css" class="font-light py-auto h-full px-6 flex items-center @if($article->language != "css") bg-sky-600/20 hover:bg-sky-600 @else bg-sky-600 @endif">
                    CSS
                </a>
            </li>

            <li class="h-full">
                <a href="{{ route('tutorials') }}/javascript" class="font-light py-auto h-full px-6 flex items-center @if($article->language != "javascript") bg-yellow-600/20 hover:bg-yellow-600 @else bg-yellow-600 @endif">
                    JavaScript
                </a>
            </li>

            <li class="h-full">
                <a href="{{ route('tutorials') }}/php" class="font-light py-auto h-full px-6 flex items-center @if($article->language != "php") bg-indigo-600/20 hover:bg-indigo-600 @else bg-indigo-600 @endif">
                    PHP
                </a>
            </li>

            <li class="h-full">
                <a href="{{ route('tutorials') }}/sql" class="font-light py-auto h-full px-6 flex items-center @if($article->language != "sql") bg-orange-600/20 hover:bg-orange-600 @else bg-orange-600 @endif">
                    SQL
                </a>
            </li>

            <div class="absolute top-0 right-0 flex h-full">
                {{-- Add -> Show article icon --}}
                <li>
                    <a href="{{ route('login') }}" class="h-full px-6 flex items-center @if($article->language != "login") bg-neutral-800/30 hover:bg-neutral-800 @else bg-neutral-800 @endif">
                        <img src="{{ asset('img/user.png') }}" alt="user icon" class="h-1/2">
                    </a>
                </li>
            </div>
        </ul>
    </nav>

    @if(in_array($article->language, ["html", "css", "javascript", "php", "sql"]))
        <nav class="w-1/6 bg-stone-200 fixed top-12 bottom-0 shadow-2xl hidden items-center flex-col" id="articles">
            <h3 class="text-2xl font-semibold m-7">
                @if($article->language === "html")
                    HTML
                @elseif($article->language === "css")
                    CSS
                @elseif($article->language === "javascript")
                    JavaScript
                @elseif($article->language === "php")
                    PHP
                @elseif($article->language === "sql")
                    SQL
                @endif
            </h3>
            <ul class="w-full font-light">
                @foreach($articles as $artic)
                    <li class="w-full @if($artic->title == $article->title) text-white @if($artic->language == "html") bg-red-600 @elseif($artic->language == "css") bg-sky-600 @elseif($artic->language == "javascript") bg-yellow-600 @elseif($artic->language == "php") bg-indigo-600 @elseif($artic->language == "sql") bg-orange-600 @endif @else hover:bg-gray-300 @endif">
                        <a href="{{ route('tutorials') }}/{{ $artic->language }}@if($artic->filename != NULL)/{{ $artic->filename }}@endif" class="w-full h-full inline-block py-0.5 pl-3">
                            {{ $artic->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    @endif
</header>

@if(in_array($article->language, ["html", "css", "javascript", "php", "sql"]))
    <div class="flex justify-center @if($article->language === "html") bg-red-600 @elseif ($article->language === "css") bg-sky-600 @elseif ($article->language === "javascript") bg-yellow-600 @elseif ($article->language === "php") bg-indigo-600 @elseif ($article->language === "sql") bg-orange-600 @endif">
        <h1 class="text-5xl font-bold text-white py-20">{{ $article->title }}</h1>
    </div>
@endif