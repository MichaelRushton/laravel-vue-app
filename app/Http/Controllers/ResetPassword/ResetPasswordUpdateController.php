<?php

declare(strict_types=1);

namespace App\Http\Controllers\ResetPassword;

use App\Actions\PasswordReset\AuthPasswordReset;
use App\Actions\PasswordReset\ResetPassword;
use App\Http\Requests\PasswordReset\PasswordResetUpdateRequest;
use App\Models\PasswordReset;

class ResetPasswordUpdateController
{
    public function __invoke(
        PasswordResetUpdateRequest $request,
        PasswordReset $password_reset,
        AuthPasswordReset $auth,
        ResetPassword $reset_password
    ) {

        $auth->handle($password_reset, $request->token);

        $reset_password->handle($password_reset, $request->validated('password'));

        return to_route('dashboard.show');

    }
}
