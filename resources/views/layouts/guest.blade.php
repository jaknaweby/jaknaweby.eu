
<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 mx-auto mt-20 w-1/2">
    <div>
        <a href="{{ route('index') }}">
            <x-application-logo class="w-24 h-24" />
        </a>
    </div>

    <div class="w-full mt-6 px-6 py-4  overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
