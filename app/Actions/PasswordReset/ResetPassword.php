<?php

declare(strict_types=1);

namespace App\Actions\PasswordReset;

use App\Models\PasswordReset;
use SensitiveParameter;

class ResetPassword
{
    public function handle(
        PasswordReset $password_reset,
        #[SensitiveParameter] string $password
    ): void {

        $password_reset->user->update([
            'password' => $password,
        ]);

        $password_reset->delete();

    }
}
