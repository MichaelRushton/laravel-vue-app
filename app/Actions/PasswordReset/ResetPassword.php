<?php

declare(strict_types=1);

namespace App\Actions\PasswordReset;

use App\Models\PasswordReset;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
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

        Auth::login($password_reset->user);

        event(new Validated(config('auth.defaults.guard'), $password_reset->user));

        session()->regenerate();

    }
}
