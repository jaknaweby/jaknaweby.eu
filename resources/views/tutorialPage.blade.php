@extends('layouts.template')

@section('title')
    {{ ucfirst($article) }}
@endsection

@section('content')
    <header class="sticky top-0">
        <nav class="w-full bg-stone-950 flex items-center justify-center h-12 relative">
            <a class="h-full px-6 flex items-center bg-zinc-900/20 hover:bg-zinc-900 absolute top-0 left-0 cursor-pointer" id="hamburger"><img src="{{ asset('img/hamburger.png') }}" alt="hamburger icon" class="h-1/2" id="hamburger-logo"></a>
    
            <ul class="flex text-white items-center text-xl h-full">
                <li class="h-full"><a href="../" class="h-full px-6 flex items-center bg-zinc-900/20 hover:bg-zinc-900"><img src="{{ asset('img/home.png') }}" alt="home icon" class="h-1/2"></a></li>
    
                <li class="h-full">
                    <a @if($lang != "html") href='../html' @else href='./' @endif class="font-light py-auto h-full px-6 flex items-center @if($lang != "html") bg-red-600/20 hover:bg-red-600 @else bg-red-600 @endif">
                        HTML
                    </a>
                </li>
    
                <li class="h-full">
                    <a @if($lang != "css") href='../html' @else href='./' @endif class="font-light py-auto h-full px-6 flex items-center @if($lang != "css") bg-sky-600/20 hover:bg-sky-600 @else bg-sky-600 @endif">
                        CSS
                    </a>
                </li>
    
                <li class="h-full">
                    <a @if($lang != "javascript") href='../html' @else href='./' @endif class="font-light py-auto h-full px-6 flex items-center @if($lang != "javascript") bg-yellow-600/20 hover:bg-yellow-600 @else bg-yellow-600 @endif">
                        JavaScript
                    </a>
                </li>
    
                <li class="h-full">
                    <a @if($lang != "php") href='../html' @else href='./' @endif class="font-light py-auto h-full px-6 flex items-center @if($lang != "php") bg-indigo-600/20 hover:bg-indigo-600 @else bg-indigo-600 @endif">
                        PHP
                    </a>
                </li>
    
                <li class="h-full">
                    <a @if($lang != "sql") href='../html' @else href='./' @endif class="font-light py-auto h-full px-6 flex items-center @if($lang != "sql") bg-orange-600/20 hover:bg-orange-600 @else bg-orange-600 @endif">
                        SQL
                    </a>
                </li>
            </ul>
    
            <div class="absolute top-0 right-0 flex h-full">
                <?php
                    // session_start();
    
                    // try {
                    //     $connection = mysqli_connect("localhost", "root", "", "jaknaweby.eu");
                    //     $queryResult = mysqli_query($connection, "SELECT isAdmin FROM users WHERE username = '{$_SESSION["username"]}'");
            
                    //     if (mysqli_num_rows($queryResult) > 0) {
                    //         $fetchedResult = mysqli_fetch_row($queryResult);
                            
                    //         if ($fetchedResult[0] == 1) {
                    //             echo "<a href=\"../article.php\" class=\"h-full px-6 flex items-center bg-zinc-900/20 hover:bg-zinc-900\"><img src=\"{$path}/img/article.png\" alt=\"article icon\" class=\"h-1/2\"></a>";
                    //         }
                    //     }
                    // } catch (Exception $e) {}
                ?>
                <a href="../login.php" class="h-full px-6 flex items-center bg-zinc-900/20 hover:bg-zinc-900"><img src="{{ asset('img/user.png') }}" alt="user icon" class="h-1/2"></a>
            </div>
        </nav>
    
        <nav class="w-1/6 bg-stone-200 fixed top-12 bottom-0 shadow-2xl hidden items-center flex-col" id="articles">
            <h3 class="text-2xl font-semibold m-7">
                @if($lang === "html")
                    HTML
                @elseif($lang === "css")
                    CSS
                @elseif($lang === "javascript")
                    JavaScript
                @elseif($lang === "php")
                    PHP
                @elseif($lang === "sql")
                    SQL
                @endif
            </h3>
            <ul class="w-full font-light">
                <?php
                // try {
                //     $connection = mysqli_connect("localhost", "root", "", "jaknaweby.eu");
                //     $articles = mysqli_query($connection, "SELECT title, url FROM articles_{$lang}");
    
                //     foreach (mysqli_fetch_all($articles) as $row) {
                //         $itemTitle = $row[0];
                //         $itemUrl = $row[1];
                //         include("../../phpComponents/navItem.php");
                //     }
                // } catch (Exception $e) {
                //     echo $e;
                // }
                ?>
            </ul>
        </nav>
    </header>
    
    <div class="flex justify-center @if($lang === "html") bg-red-600 @elseif ($lang === "css") bg-sky-600 @elseif ($lang === "javascript") bg-yellow-600 @elseif ($lang === "php") bg-indigo-600 @elseif ($lang === "sql") bg-orange-600 @endif">
        <h1 class="text-5xl font-bold text-white py-20">{{ $article }}</h1>
    </div>
@endsection

@section('script')
    <script>
        let hamburger = document.querySelector("#hamburger");
        let hamburgerLogo = document.querySelector("#hamburger-logo");
        let navbar = document.querySelector("#articles");
        let turnedOn = false;

        hamburger.addEventListener("click", function() {
            if (!turnedOn) {
                navbar.style.display = "flex";
                hamburgerLogo.src = "{{ asset('img/cross.jpg') }}";
                hamburgerLogo.alt = "cross icon";
            } else {
                navbar.style.display = "";
                hamburgerLogo.src = "{{ asset('img/hamburger.png') }}";
                hamburgerLogo.alt = "hamburger icon";
            }

            turnedOn = !turnedOn
        });
    </script>
@endsection