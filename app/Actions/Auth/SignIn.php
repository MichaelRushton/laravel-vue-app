<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

class SignIn
{
    public function handle(User $user): void
    {

        Auth::login($user);

        event(new Validated(config('auth.defaults.guard'), $user));

        session()->regenerate();

    }
}
