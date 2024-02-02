@extends('layouts.template')

@section('title')
    @yield('auth-title')
@endsection

@section('css')
    @yield('auth-css')
@endsection

@section('content')
    @php $article = new App\Models\Article(); $article->language = "login"; @endphp
    @include('includes.navbar')
    
    @yield('auth-content')
@endsection

@section('script')
    @yield('auth-script')
@endsection