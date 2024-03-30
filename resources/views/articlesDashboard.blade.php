@extends('layouts.auth-template')

@section('auth-title')
    Articles management
@endsection

@section('auth-script')
    
@endsection

@section('auth-content')
    <table class="w-11/12 mx-auto mt-8 bg-zinc-200 text-lg text-center p-3 font-light">
        <tr class="bg-zinc-400/50">
            <th class="w-4/12">Title</th>
            <th class="w-3/12">Sublink</th>
            <th class="w-2/12">Language</th>
            <th class="w-1/12">Published</th>
            <th class="w-1/12"></th>
            <th class="w-1/12"></th>
        </tr>

        {{-- Shows all current articles --}}
        @php $articleIndex = 0; @endphp
        @foreach (\App\Models\Article::all() as $article)
            <tr @if($articleIndex % 2 == 0) class="bg-zinc-300" @endif>
                <td>{{ $article->title }}</td>
                <td>@if ($article->filename != "") {{ $article->filename }} @else index (no sublink) @endif</td>
                <td>@if ($article->language == "javascript") JS @else {{ strtoupper($article->language) }} @endif</td>
                <td>{{ $article->isPublished }}</td>

                <form method="POST" action="{{ route('deleteArticle') }}">
                    @csrf
                    @method('delete')
                    <td>
                        <button value="{{ $article->id }}" type="submit" name="remove" onclick="return confirm('Are you sure you want to remove {{ $article->title }}?');" class="h-full w-full hover:bg-zinc-400/25">Remove</button>
                    </td>
                </form>

                <form action="{{ route('editPage', $article->id) }}">
                    @csrf
                    <td>
                        <button type="submit" class="h-full w-full hover:bg-zinc-400/25">Edit</button>
                    </td>
                </form>
            </tr>

            @php $articleIndex++; @endphp
        @endforeach

        {{-- Shows create article line --}}
        <tr @if($articleIndex % 2 == 0) class="bg-zinc-300" @endif>
            <form action="{{ route('addArticle') }}" method="POST">
                @csrf

                <td>
                    <input class="!py-0 !bg-transparent w-full !border-0 !pl-1 text-center text-lg focus:!outline-none !ring-0 placeholder:italic" placeholder="Enter a title" type="text" name="title" required autocomplete="off" value="{{ old('title') }}">
                </td>

                <td>
                    <input class="!py-0 !bg-transparent w-full !border-0 !pl-1 text-center text-lg !ring-0 placeholder:italic" placeholder="index (no sublink)" type="text" name="sublink" autocomplete="off" value="{{ old('sublink') }}">
                </td>

                <td>
                    <select name="language" id="language" class="bg-transparent border-0 py-0 w-full text-center text-lg !ring-0" required>
                        <option value="" disabled selected>Choose a language</option>
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                        <option value="javascript">JavaScript</option>
                        <option value="php">PHP</option>
                        <option value="sql">SQL</option>
                    </select>
                </td>

                <td>
                    <input type="checkbox" name="is_published" id="is_published" class="!ring-0 !outline-none">
                </td>

                <td colspan="2">
                    <button type="submit" name="create" class="w-full hover:bg-zinc-400/25">Create</button>
                </td>
            </form>
        </tr>

    </table>
    
    @if ($errors->any())
        <div class="bg-neutral-200 w-11/12 mx-auto mt-5 flex flex-col items-center rounded-lg p-5">
            @foreach ($errors->all() as $error)
                <p class="text-red-700 text-lg">{{ $error }}</p>
            @endforeach
        </div>
    @endif
@endsection