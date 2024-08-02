<x-app-layout>

    <x-slot:header>
        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold text-white">Todos</h1>
            <a href="{{route('todos.create')}}">
                <x-primary-button>Add</x-primary-button>
            </a>
        </div>
    </x-slot:header>

    <div class="p-5">
        <form method="POST" action="{{ route('todos.store') }}" class="grid gap-2">
            @csrf

            <!-- title -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')"
                    required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- body -->
            <div>
                <x-input-label for="body" :value="__('Body')" />
                <x-text-input id="body" class="block w-full mt-1" type="text" name="body" :value="old('body')"
                    autofocus />
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
            </div>

            <!-- tags -->
            <div>
                <x-input-label for="tags" :value="__('Tags')" />
                <x-text-input id="tags" class="block w-full mt-1" type="text" name="tags" :value="old('tags')" required
                    autofocus />
                <x-input-error :messages="$errors->get('tags')" class="mt-2" />
            </div>

            <x-primary-button class="w-fit">
                {{ __('Create') }}
            </x-primary-button>
        </form>
    </div>

</x-app-layout>