<?php
namespace App\Enums;

enum UserRoles: string 
{
    case Viewer = 'viewer';
    case Creator = 'creator';

    public static function defaultCase():self {
        return self::Viewer;
    }

    public static function values(): array {
        return array_map(fn($a) => $a->value, self::cases());
    }
}