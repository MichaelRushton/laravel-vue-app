<?php

declare(strict_types=1);

namespace App\Http\Controllers\ResetPassword;

use Inertia\Response as InertiaResponse;

class ResetPasswordCreateController
{
    public function __invoke(): InertiaResponse
    {
        return inertia('PasswordReset/Create');
    }
}
