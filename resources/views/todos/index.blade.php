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
        <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                        Todo</th>
                    <th
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                        Body</th>
                    <th
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                        Tags</th>
                    <th
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-900">
                @isset($todos)
                @foreach ($todos as $todo)
                <tr class="border-b dark:border-gray-700">
                    <td class="px-6 py-4 text-lg font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{route('todos.show', ['todo'=>$todo])}}">{{
                            $todo->title }}</a>
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 truncate whitespace-nowrap dark:text-white">
                        {{
                        $todo->body
                        }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex flex-wrap gap-1">
                            @foreach ($todo->tags as $tag)
                            <span
                                class="p-1 text-center text-white rounded shadow-sm bg-slate-600">{{$tag->name}}</span>
                            @endforeach
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex flex-wrap gap-1">
                            <a href="{{route('todos.edit', ['todo'=>$todo])}}">
                                <x-secondary-button>Edit</x-secondary-button>
                            </a>

                            <form method="post" action="/todos/{{$todo->id}}">
                                @csrf
                                @method('delete')
                                <x-secondary-button type="submit">Delete</x-secondary-button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endisset
            </tbody>
        </table>
    </div>

</x-app-layout>