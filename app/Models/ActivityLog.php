<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Activitylog\Models\Activity;

class ActivityLog extends Activity
{
    protected $appends = [
        'module',
    ];

    public function module(): Attribute
    {
        return new Attribute(
            get: function () {
                $module = strtolower($this->log_name);
                $module = basename(str_replace('\\', '/', $module));

                return __('menu.'.$module);
            }
        );
    }

    public function scopeSearch(Builder $query, ?string $search)
    {
        return $query->when($search, function (Builder $query, string $search) {
            return $query
                ->where('log_name', 'LIKE', $search.'%')
                ->orWhere('subject', $search);
        });
    }

    public function scopeRender(Builder $query, ?int $page): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $query->latest()->paginate($page ?? 50)->withQueryString();
    }
}
