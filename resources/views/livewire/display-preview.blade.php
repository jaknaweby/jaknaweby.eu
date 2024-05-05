@php
    $article = App\Models\Article::all()->find($id);
    $content = json_decode($content);

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

    $anyComponents = false;
    if ($content != null) {
        foreach ($content->components as $key => $value) {
            if ($value->shown == 1) {
                $anyComponents = true;
                break;
            }
        }
    } else {
        $content = json_decode($article->content);

        if ($content == null) {
            $content = new stdClass();
            $content->id = 0;
            $content->components = new stdClass();
        }
    }
@endphp

<div class="pt-16">
    @if ($isPreview == true)
        @if ($anyComponents == true)
            <x-input-label :value="__('Content preview')" />
            <div class="border-solid border border-gray-300 rounded-lg px-5 mt-1">
        @else
            <x-input-label :value="__('There is no content to be previewed')" />
        @endif 
    @endif

    @foreach ($content->components as $component_id => $component)
        @if ($component->shown == 0)
            @continue
        @endif

        <div class="mt-10">
        @switch($component->type_id)
            @case(1)
            @case(2)
                    @php
                        if ($component->content->list->name == "Ordered item" || $component->content->list->name == "Unordered item") {
                            $element = "li";
                        } else {
                            $element = "p";
                        }
                    @endphp

                    @if ($component->type_id == 1)
                        <h2 class="text-3xl font-medium mb-3 pb-2 border-b-2 border-{{ $color }}-500">{{ $component->content->title }}</h2>
                    @elseif ($component->type_id == 2)
                        <h3 class="text-2xl mb-3 pb-1 w-fit border-b border-{{ $color }}-500">{{ $component->content->title }}</h3>
                    @endif
                    
                    @if ($component->content->list->name == "Ordered item")
                        <ol class="list-decimal list-inside">
                    @elseif ($component->content->list->name == "Unordered item")
                        <ul class="list-disc list-inside">
                    @endif

                    @foreach ($component->content->list->items as $item)
                        <{{ $element }} class="font-light mb-2">{!! $item !!}</{{ $element }}>
                    @endforeach

                    @if ($component->content->list->name == "Ordered item")
                        </ol>
                    @elseif ($component->content->list->name == "Unordered item")
                        </ul>
                    @endif
                @break
        @endswitch
        </div>
    @endforeach
    
    @if ($isPreview == true && $anyComponents == true)
        </div>
    @endif
</div>
