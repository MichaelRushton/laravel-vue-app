<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthDestroyController
{
    public function __invoke(): RedirectResponse
    {

        Auth::logout();

        session()->invalidate();

        return to_route('login');

    }
}
