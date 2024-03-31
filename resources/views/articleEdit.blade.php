@extends('layouts.auth-template')

@php
    $article = \App\Models\Article::find($id);
@endphp

@section('auth-title')
    @if ($article != NULL)
        Editing {{ $article->title }}
    @endif
@endsection

@section('auth-content')
    @if($article != NULL)
        <div class="w-auto mx-auto mt-10 flex flex-col items-center">
            <p class="text-center text-2xl">Editing article <span class="font-semibold">{{ $article->id }}</span></p>
            <x-input-error :messages="$errors->get('errors')" class="mt-2" />
        </div>

        <form class="w-11/12 mx-auto mt-10" method="post" action="{{ route('editArticle', ['id' => $article->id]) }}" id="edit">
            @csrf
            @method('put')
        </form>

        <div class="w-11/12 m-auto">
            {{-- Title --}}
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input form="edit" id="title" class="block mt-1 w-full" type="text" name="title" required autocomplete="title" value="{{ $article->title }}" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            
            {{-- Content --}}
            <div class="mt-5">
                @livewire('display-preview', ['isPreview' => true, 'content' => $article->content, 'id' => $article->id]) {{-- Content preview --}}
                <form action="{{ route('editContent', ['id' => $id]) }}">
                    @csrf
                    <x-secondary-button type="submit" class="mt-2 !block !bg-green-800 !text-white border-0 hover:!bg-green-900 focus:!outline-none focus:!ring-2 focus:!ring-green-500 focus:!ring-offset-2">
                        Edit content
                    </x-secondary-button>
                </form>
            </div>

            {{-- Filename --}}
            <div class="mt-5">
                <x-input-label for="filename" :value="__('Filename')" />
                <x-text-input form="edit" id="filename" class="block mt-1 w-full placeholder:italic" type="text" name="filename" autocomplete="filename" value="{{ $article->filename }}" placeholder="index (no sublink)"/>
                <x-input-error :messages="$errors->get('filename')" class="mt-2" />
            </div>

            {{-- Language --}}
            <div class="mt-5">
                <x-input-label for="language" :value="__('Language')" />
                <select form="edit" class="mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="language" id="language">
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
                <input form="edit" id="is_published" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_published" @if ($article->isPublished == 1) checked="true" @endif>
                <span class="ms-2 block font-medium text-sm">Is published</span>
            </label>

            <x-primary-button form="edit" class="mt-5" name="submit" value="clicked" onclick="return confirm('Are you sure you want to apply changes made?');">
                Apply changes
            </x-primary-button>

            <x-secondary-button form="edit" type="submit" value="clicked" name="discard" onclick="return confirm('Are you sure you want to discard changes made?');" class="mt-2 !block !bg-red-800 !text-white border-0 hover:!bg-red-900 focus:!outline-none focus:!ring-2 focus:!ring-red-500 focus:!ring-offset-2">
                Discard changes
            </x-secondary-button>
        </div>
    @else
        <script>
            window.location = "{{ route('management') }}";
        </script>
    @endif
@endsection