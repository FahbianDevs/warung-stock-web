<?php

use App\Enums\UserRole;
use App\Models\User;

test('admin can access admin dashboard and products', function () {
    $admin = User::factory()->create([
        'role' => UserRole::Admin,
    ]);

    $this->actingAs($admin)
        ->get(route('admin.dashboard'))
        ->assertOk();

    $this->actingAs($admin)
        ->get(route('products.index'))
        ->assertOk();
});

test('regular user cannot access admin pages', function () {
    $user = User::factory()->create([
        'role' => UserRole::User,
    ]);

    $this->actingAs($user)
        ->get(route('admin.dashboard'))
        ->assertForbidden();

    $this->actingAs($user)
        ->get(route('products.index'))
        ->assertForbidden();
});
