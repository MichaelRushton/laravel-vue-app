<?php

declare(strict_types=1);

namespace App\Enums;

enum UserStatus: string
{
    case Active = 'active';
    case Inactive = 'inactive';

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
