<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Blog') }}
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white sm:rounded-lg">

            <form method="POST" action="/update">
            @method('PUT')
            @csrf
            <input type="hidden" value="{{$id}}" name="id"/>
            <div class="p-6">
                <x-input-label for="title" :value="__('Blog Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$title}}" required  />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class=" overflow-hidden shadow-sm sm:rounded-lg p-6">
                <x-input-label for="body" :value="__('Blog Content')" />
                <textarea rows="40" name="body" id="body" class="form-control block mt-1 w-full sm:rounded-lg">{{ old('body', $content) }}</textarea>

            </div>
            <div class="p-6">
            <x-primary-button class="ml-3">
                {{ __('Update') }}
            </x-primary-button>
            </div>
            </form>
        </div>
    </div>

</x-app-layout>