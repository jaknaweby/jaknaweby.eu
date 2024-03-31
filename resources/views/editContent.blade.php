@extends('layouts.auth-template')

@section('auth-content')
    @livewire('dynamic-elements', ['id' => $id])
@endsection