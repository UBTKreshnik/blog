<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 prose">
                {!! $content !!}
                </div>
            </div>
        </div>
    </div>
    <div class="pt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h3 class="pl-6 font-semibold text-xl text-gray-800 leading-tight pb-6">
            {{ __('Comments') }}
        </h3>
        <div class="p-6">
        @foreach($comments as $comment)
        <div class="mb-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex justify-between">
                <b class="p-2">{{ $comment->user->name }}</b>
                <p class="p-2 font-light text-gray-800">{{ $comment->created_at }}</p>
            </div>
            <p class="p-2">{{ $comment->text }}</p>
        </div>
        @endforeach
        </div>

        <form method="POST" action="/comments" >
            @csrf
            <input type="hidden" value="{{ $id }}" name="blog_id">
            <div class="felx">
                <div class="p-6">
                    <x-input-label for="Comment" :value="__('Write Comment')" />
                    <x-text-input id="comment" class="block mt-1 min-w-full" type="text" name="text" value="{{old('comment')}}" required  />
                    <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                </div>
                <div class="p-3">
                    <x-primary-button class="ml-3">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>