<?php

declare(strict_types=1);

namespace App\Http\Controllers\ResetPassword;

use App\Actions\Auth\SignIn;
use App\Actions\PasswordReset\ResetPassword;
use App\Http\Requests\PasswordReset\PasswordResetUpdateRequest;
use App\Models\PasswordReset;
use Illuminate\Http\RedirectResponse;

class ResetPasswordUpdateController
{
    public function __invoke(
        PasswordResetUpdateRequest $request,
        PasswordReset $password_reset,
        ResetPassword $reset_password,
        SignIn $sign_in
    ): RedirectResponse {

        $reset_password->handle($password_reset, $request->validated('password'));

        $sign_in->handle($password_reset->user);

        return to_route('dashboard.show');

    }
}
