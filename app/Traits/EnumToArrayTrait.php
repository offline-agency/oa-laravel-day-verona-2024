<?php

namespace App\Traits;

trait EnumToArrayTrait
{
    public static function convert(): array
    {
        return collect(self::cases())
            ->map(function ($enum) {
                return [
                    'label' => method_exists(self::class, 'getDescription') ? self::getDescription($enum) : $enum->name,
                    'value' => $enum->value,
                ];
            })->toArray();
    }
}
