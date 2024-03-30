@extends('layouts.auth-template')

@php
    $article = \App\Models\Article::where('id', $id)->first();
@endphp

@section('auth-content')
    @livewire('dynamic-elements', ['id' => $id, 'json' => json_decode($article->content)])
@endsection