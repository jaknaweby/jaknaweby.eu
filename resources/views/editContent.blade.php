@extends('layouts.auth-template')

@php
    $article = \App\Models\Article::find($id);
@endphp

@section('auth-title')
    Editing content of {{ $article->title }}
@endsection

@section('auth-content')
    @livewire('dynamic-elements', ['id' => $id, 'detailsOpen' => new stdClass()])
@endsection