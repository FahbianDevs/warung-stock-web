<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(403);
        }

        $allowedRoles = collect($roles)
            ->map(function (string $role): string {
                if ($role === 'user') {
                    return 'user';
                }

                return UserRole::tryFrom($role)?->value ?? $role;
            })
            ->all();

        $userRole = $user->role?->value ?? $user->role;
        $normalizedUserRole = $userRole === 'staff' ? 'user' : $userRole;

        if (! in_array($normalizedUserRole, $allowedRoles, true)) {
            abort(403);
        }

        return $next($request);
    }
}
