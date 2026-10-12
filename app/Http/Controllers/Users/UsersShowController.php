<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Http\Resources\Users\UsersShowResource;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UsersShowController
{
    public function __invoke(User $user): UsersShowResource
    {

        Gate::authorize('view', $user);

        return new UsersShowResource($user);

    }
}
