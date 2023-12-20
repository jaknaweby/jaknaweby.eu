@extends('layouts.template')

@section('title')
    {{ ucfirst($article->title) }}
@endsection

@section('content')
    @include('includes.navbar')

    <div>
        {{-- Actual content --}}
        {{ $article->content }}        
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