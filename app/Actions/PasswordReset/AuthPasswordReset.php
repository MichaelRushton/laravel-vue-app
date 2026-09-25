<?php

declare(strict_types=1);

namespace App\Actions\PasswordReset;

use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;

class AuthPasswordReset
{
    public function handle(
        PasswordReset $password_reset,
        string $token
    ): int {

        if (! Hash::check($token, $password_reset->token)) {
            return 403;
        }

        if ($password_reset->expires_at < now()) {
            return 419;
        }

        return 200;

    }
}
