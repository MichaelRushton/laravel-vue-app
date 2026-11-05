<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Auth;

class SignOut
{
    public function handle(): void
    {

        Auth::logout();

        session()->invalidate();

    }
}
