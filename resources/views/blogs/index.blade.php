<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>
    <div class="py-3">
        @foreach ($blogs as $blog )
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3 flex">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:border-sky-500 border-2 min-w-full">
                <a href="{{ route('blogs.show', ['id' => $blog->id]) }}">
                    <div class="p-6 text-gray-900">
                        {{ $blog->title }}
                    </div>
                </a>                
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:bg-sky-500 border-2 max-w-max min-w-max">
                <a href="{{ route('blogs.edit', ['id' => $blog->id]) }}">
                    <div class="p-6 text-gray-900">
                        {{ __('Edit') }}
                    </div>
                </a>
            </div>        
        </div>

        @endforeach
    </div>

</x-app-layout>