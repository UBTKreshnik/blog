<?php
namespace App\Enums;

enum UserRoles: string 
{
    case Viewer = 'viewer';
    case Creator = 'creator';
}