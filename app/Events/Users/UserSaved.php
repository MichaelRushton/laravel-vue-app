<?php

declare(strict_types=1);

namespace App\Events\Users;

use App\Models\User;

readonly class UserSaved
{
    public function __construct(
        public User $user
    ) {}
}
