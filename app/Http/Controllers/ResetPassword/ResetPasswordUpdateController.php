<?php

declare(strict_types=1);

namespace App\Http\Controllers\ResetPassword;

use App\Actions\PasswordReset\AuthPasswordReset;
use App\Actions\PasswordReset\ResetPassword;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordReset\PasswordResetUpdateRequest;
use App\Models\PasswordReset;

class ResetPasswordUpdateController extends Controller
{
    public function __invoke(
        PasswordResetUpdateRequest $request,
        PasswordReset $password_reset,
        AuthPasswordReset $auth,
        ResetPassword $reset_password
    ) {

        if (200 !== $response_code = $auth->handle($password_reset, $request->token)) {
            abort($response_code);
        }

        $reset_password->handle($password_reset, $request->validated('password'));

        return to_route('dashboard.show');

    }
}
