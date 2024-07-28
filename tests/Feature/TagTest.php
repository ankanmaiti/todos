<?php

use App\Models\Tag;
use App\Models\Todo;
use App\Models\User;

it('belongs to an Users', function () {
    $user = User::factory()->create();
    $todo = Tag::factory()->create(['user_id' => $user->id]);

    expect($todo->user->is($user))->toBeTrue();
});

it('belongs to a Todo', function () {
    $tag = Tag::factory()->create();
    $todo = Todo::factory()->create();

    $tag->todos()->attach($todo->pluck('id'));

    expect($tag->todos->contains($todo))->toBeTrue();
});

it('has many Todos', function () {
    $tag = Tag::factory()->create();
    $todos = Todo::factory()->count(5)->create();

    $tag->todos()->attach($todos->pluck('id'));

    expect($tag->todos->contains($todos))->toBeTrue();
});
