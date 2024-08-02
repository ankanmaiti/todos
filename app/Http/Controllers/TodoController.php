<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Traits\Dumpable;

class TodoController extends Controller
{
    use Dumpable;

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $todos = Auth::user()->todos;

        return view('todos.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $todo = Todo::create([
            ...$validatedData,
            'user_id' => Auth::user()->id,
        ]);

        $tags = explode(',', $validatedData['tags']);
        foreach ($tags as $tag) {
            $todo->attachTag(trim($tag));
        }

        return redirect(route('todos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return view('todos.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo): View
    {
        return view('todos.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo): RedirectResponse
    {
        $validatedData = $request->validated();

        $todo->update($validatedData);

        return redirect(route('todos.show', ['todo' => $todo]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect(route('todos.index'));
    }
}
