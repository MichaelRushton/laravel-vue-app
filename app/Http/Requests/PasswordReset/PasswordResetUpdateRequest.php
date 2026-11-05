<?php

declare(strict_types=1);

namespace App\Http\Requests\PasswordReset;

use App\Actions\PasswordReset\AuthPasswordReset;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class PasswordResetUpdateRequest extends FormRequest
{
    public function authorize(AuthPasswordReset $auth): bool
    {

        $auth->handle($this->route('password_reset'), $this->token);

        return true;

    }

    public function rules(): array
    {
        return [
            'password' => ['required', 'string', Password::defaults()],
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'Please enter your password.',
            'password.string' => 'Please enter your password.',
            'password.min' => 'Your password must be at least :min characters.',
        ];
    }
}
