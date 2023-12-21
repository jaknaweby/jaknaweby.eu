@extends('layouts.template')

<?php
    use App\Models\Article;

    $article = new Article();
    $article->language = "login";
?>

@section('title')
    Přihlášení
@endsection

@section('content')
    @include('includes.navbar')
    <h1>Přihlášení</h1>
@endsection