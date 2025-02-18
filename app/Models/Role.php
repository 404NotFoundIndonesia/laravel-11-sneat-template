<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Role extends \Spatie\Permission\Models\Role
{
    public function scopeSearch(Builder $query, ?string $search)
    {
        return $query->when($search, function (Builder $query, string $search) {
            return $query->where('name', 'LIKE', $search.'%');
        });
    }

    public function scopeRender(Builder $query, ?int $page): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $query->paginate($page ?? 50)->withQueryString();
    }
}
