<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;

use App\Http\Requests\Users\UsersStoreRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UsersStoreController
{
    public function __invoke(UsersStoreRequest $request): RedirectResponse
    {

        new User($request->validated())->saveOrFail();

        return to_route('users.index')->withFlash([
            'success' => 'The user has been created.',
        ]);

    }
}
