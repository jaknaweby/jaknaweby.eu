@extends($exception->getMessage() == 'tutorial' ? 'layouts.auth-template' : 'layouts.template')

@if ($exception->getMessage() == 'tutorial')    
    @section('auth-content')
        <div class="m-auto sm:px-6 lg:px-8 font-light text-gray-500 uppercase tracking-wider flex flex-col items-center">
            <div class="flex items-center pt-8 sm:justify-start sm:pt-0 mb-2">
                <div class="px-4 text-lg  border-r border-gray-400 tracking-wider">
                    404
                </div>

                <div class="ml-4 text-lg uppercase tracking-wider">
                    The article you are looking for wasn't found
                </div>
            </div>
            <div class="text-gray-800 underline">
                <a href="{{ route('tutorials') }}">
                    Return to index page
                </a>
            </div>
        </div>
    @endsection
@else
    @section('content')
        <div class="m-auto sm:px-6 lg:px-8 font-light text-gray-500 uppercase tracking-wider flex flex-col items-center">
            <div class="flex items-center pt-8 sm:justify-start sm:pt-0 mb-2">
                <div class="px-4 text-lg  border-r border-gray-400 tracking-wider">
                    404
                </div>

                <div class="ml-4 text-lg uppercase tracking-wider">
                    The page you are looking for wasn't found
                </div>
            </div>
            <div class="text-gray-800 underline">
                <a href="{{ route('index') }}">
                    Return to index page
                </a>
            </div>
        </div>
    @endsection
@endif

@section('auth-margin')
    !m-0
@endsection