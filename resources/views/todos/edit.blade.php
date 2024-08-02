<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @isset($todo)
        <form method="POST" action="/todos/{{$todo->id}}" class="grid gap-2">
            @csrf
            @method('patch')

            <!-- title -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block w-full mt-1" type="text" name="title"
                    :value="old('title', $todo->title)" required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- body -->
            <div>
                <x-input-label for="body" :value="__('Body')" />
                <x-text-input id="body" class="block w-full mt-1" type="text" name="body"
                    :value="old('body', $todo->body)" autofocus />
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
            </div>

            <!-- tags -->
            <div>
                <x-input-label for="tags" :value="__('Tags')" />
                <x-text-input id="tags" class="block w-full mt-1" type="text" name="tags"
                    :value="old('tags', $todo->tags)" required autofocus />
                <x-input-error :messages="$errors->get('tags')" class="mt-2" />
            </div>

            <x-primary-button type="submit" class="w-fit">
                {{ __('Update') }}
            </x-primary-button>
        </form>
        @endisset
    </div>
    </div>
</x-app-layout>