<?php

use App\Models\Todo;
use App\Models\User;

it('belongs to an user', function () {
    $user = User::factory()->create();
    $todo = Todo::factory()->create(['user_id' => $user->id]);

    expect($todo->user->is($user))->toBeTrue();
});
