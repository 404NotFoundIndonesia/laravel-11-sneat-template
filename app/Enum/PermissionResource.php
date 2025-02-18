<?php

namespace App\Enum;

enum PermissionResource: string
{
    case USER = 'user';
    case ROLE = 'role';
}
