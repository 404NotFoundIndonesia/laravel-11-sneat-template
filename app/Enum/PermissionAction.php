<?php

namespace App\Enum;

enum PermissionAction: string
{
    case VIEW = 'view';
    case CREATE = 'create';
    case EDIT = 'edit';
    case DELETE = 'delete';
    case EXPORT = 'export';
    case IMPORT = 'import';
}
