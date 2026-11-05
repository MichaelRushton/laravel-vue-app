<?php

declare(strict_types=1);

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ImpersonateUser
{
    public function __construct(
        public protected(set) UnimpersonateUser $unimpersonate,
        public protected(set) SaveUserImpersonation $save_impersonation
    ) {}

    public function handle(
        User $user,
        User $admin
    ): bool {

        if ($user->id === $impersonated_by = session('impersonated_by')) {
            return $this->unimpersonate->handle();
        }

        if (! $impersonated_by) {
            session(['impersonated_by' => $admin->id]);
        } else {
            $admin = User::findOrFail($impersonated_by);
        }

        $this->save_impersonation->handle($user, $admin);

        Auth::login($user);

        session()->regenerate();

        return true;

    }
}
