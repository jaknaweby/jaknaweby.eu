@extends('layouts.template')

<?php
    use App\Models\Article;

    $article = new Article();
    $article->language = "login";
?>

@section('title')
    Registrace
@endsection

@section('content')
    @include('includes.navbar')
    <h1>Registrace</h1>
@endsection