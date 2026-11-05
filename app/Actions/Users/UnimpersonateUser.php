<?php

declare(strict_types=1);

namespace App\Actions\Users;

use Illuminate\Support\Facades\Auth;

class UnimpersonateUser
{
    public function handle(): void
    {

        if (! $impersonated_by = session('impersonated_by')) {
            abort(400);
        }

        Auth::loginUsingId($impersonated_by);

        session()->forget('impersonated_by');

        session()->regenerate();

    }
}
