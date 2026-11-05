<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\SignOut;
use Illuminate\Http\RedirectResponse;

class AuthDestroyController
{
    public function __invoke(SignOut $sign_out): RedirectResponse
    {

        $sign_out->handle();

        return to_route('login');

    }
}
