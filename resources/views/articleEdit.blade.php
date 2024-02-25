@extends('layouts.auth-template')

@php
    $article = \App\Models\Article::where('id', $id)->first();
@endphp

@section('auth-title')
    @if ($article != NULL)
        Editing {{ $article->title }}
    @else
        Error - article not found
    @endif
@endsection

@section('auth-content')
    @if($article != NULL)
        <div class="w-auto mx-auto mt-10 flex flex-col items-center">
            <p class="text-center text-2xl">Editing article <span class="font-semibold">{{ $article->id }}</span></p>
            <x-input-error :messages="$errors->get('errors')" class="mt-2" />
        </div>

        <form class="w-11/12 mx-auto mt-10" method="POST" action="{{ route('editArticle', ['id' => $article->id]) }}">
            @csrf
            @method('put')

            {{-- Title --}}
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required autocomplete="title" value="{{ $article->title }}"/>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            
            {{-- Content --}}
            <div class="mt-5">
                <x-input-label for="content" :value="__('Content')" />
                <textarea class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm placeholder:italic" name="content" id="content" placeholder="no content" cols="30" rows="10">{{ $article->content }}</textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            {{-- Filename --}}
            <div class="mt-5">
                <x-input-label for="filename" :value="__('Filename')" />
                <x-text-input id="filename" class="block mt-1 w-full placeholder:italic" type="text" name="filename" autocomplete="filename" value="{{ $article->filename }}" placeholder="index (no sublink)"/>
                <x-input-error :messages="$errors->get('filename')" class="mt-2" />
            </div>

            {{-- Language --}}
            <div class="mt-5">
                <x-input-label for="language" :value="__('Language')" />
                <select class="mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="language" id="language">
                    <option value="html" @if($article->language == "html") selected @endif>HTML</option>
                    <option value="css" @if($article->language == "css") selected @endif>CSS</option>
                    <option value="javascript" @if($article->language == "javascript") selected @endif>JavaScript</option>
                    <option value="php" @if($article->language == "php") selected @endif>PHP</option>
                    <option value="sql" @if($article->language == "sql") selected @endif>SQL</option>
                </select>
                <x-input-error :messages="$errors->get('language')" class="mt-2" />
            </div>

            {{-- Is published --}}
            <label for="is_published" class="flex items-center mt-5">
                <input id="is_published" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_published" @if ($article->isPublished == 1) checked="true" @endif>
                    {{-- <span class="ms-2 text-sm text-gray-600">Is published</span> --}}
                <span class="ms-2 block font-medium text-sm">Is published</span>
            </label>

            <x-primary-button class="mt-5" name="submit" value="clicked" onclick="return confirm('Are you sure you want to apply changes made?');">
                Apply changes
            </x-primary-button>

            <x-secondary-button type="submit" value="clicked" name="discard" onclick="return confirm('Are you sure you want to discard changes made?');" class="mt-2 !block !bg-red-800 !text-white border-0 hover:!bg-red-900 focus:!outline-none focus:!ring-2 focus:!ring-red-500 focus:!ring-offset-2">
                Discard changes
            </x-secondary-button>
        </form>
    @else
        <script>
            window.location = "{{ route('management') }}";
        </script>

        <p class="text-center text-red-800 text-2xl mt-10 font-medium">Article not found - error</p>
    @endif
@endsection