<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Actions\Auth\SignOut;
use App\Enums\UserStatus;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUserActive
{
    public function __construct(
        public protected(set) SignOut $sign_out
    ) {}

    public function handle(
        Request $request,
        Closure $next
    ): Response {

        if ($request->user() && $request->user()->status !== UserStatus::Active) {

            $this->sign_out->handle();

            return to_route('login')->withFlash([
                'error' => 'Your account has been deactivated.',
            ]);

        }

        return $next($request);

    }
}
