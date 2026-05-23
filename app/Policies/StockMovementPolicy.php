<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Inventory\Models\StockMovement;
use App\Models\User;

class StockMovementPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, [UserRole::Admin, UserRole::Staff], true);
    }

    public function create(User $user): bool
    {
        return $this->viewAny($user);
    }

    public function view(User $user, StockMovement $stockMovement): bool
    {
        return $this->viewAny($user);
    }
}
