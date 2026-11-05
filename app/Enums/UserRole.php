<?php

declare(strict_types=1);

namespace App\Enums;

enum UserRole: string
{
    case Administrator = 'administrator';
    case User = 'user';

    public function name(): string
    {
        return ucfirst($this->value);
    }

    public static function dropdown(): array
    {

        return array_map(fn ($case) => [
            'value' => $case->value,
            'label' => $case->name(),
        ], self::cases());

    }
}
