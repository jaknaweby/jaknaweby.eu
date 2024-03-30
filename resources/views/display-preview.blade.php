@php
    $content = json_decode($content);
    $article = App\Models\Article::all()->find($id);

    $color;
    if ($article->language == "html") {
        $color = "red";
        // text-red-500
        // bg-red-500
        // border-red-500
    } else if ($article->language == "css") {
        $color = "blue";
        // text-blue-500
        // bg-blue-500
        // border-blue-500
    } else if ($article->language == "javascript") {
        $color = "yellow";
        // text-yellow-500
        // bg-yellow-500
        // border-yellow-500
    } else if ($article->language == "php") {
        $color = "indigo";
        // text-indigo-500
        // bg-indigo-500
        // border-indigo-500
    } else if ($article->language == "sql") {
        $color = "orange";
        // text-orange-500
        // bg-orange-500
        // border-orange-500
    }
@endphp

<div class="mt-5">
    @if ($content == NULL)
        Content not generated as a JSON
    @else
        <x-input-label :value="__('Content preview')" />
        <div class="border-solid border border-gray-300 rounded-lg px-5 mt-1">
            @foreach ($content->components as $component_id => $component)
                @if ($component->shown == 0)
                    @continue
                @endif

                @switch($component->type_id)
                    @case(1)
                        <div class="mt-32">
                            <h2 class="text-4xl font-medium mb-3 pb-2 border-b-2 border-{{ $color }}-500">{{ $component->content->title }}</h2>
                            @foreach ($component->content->list->items as $item)
                                <p class="font-light text-xl mb-2">{{ $item }}</p>
                            @endforeach
                        </div>
                        @break
                    @case(2)
                        
                        @break
                    @default        
                @endswitch
            @endforeach
        </div>
    @endif

    @if ($showButton == true)
        <form action="{{ route('editContent', ['id' => $id]) }}">
            @csrf
            <input type="submit" value="Edit content">
        </form>
    @endif
</div>
