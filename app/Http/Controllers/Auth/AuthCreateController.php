<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Inertia\Response;

class AuthCreateController
{
    public function __invoke(): Response
    {
        return inertia('Auth/Create');
    }
}
