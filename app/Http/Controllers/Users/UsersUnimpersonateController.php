<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Actions\Users\UnimpersonateUser;
use Illuminate\Http\RedirectResponse;

class UsersUnimpersonateController
{
    public function __invoke(UnimpersonateUser $unimpersonate): RedirectResponse
    {

        if (! $unimpersonate->handle()) {
            abort(400);
        }

        return to_route('dashboard.show');

    }
}
