<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends \Spatie\Permission\Models\Role
{
    use LogsActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName(self::class)
            ->logOnly([
                'name',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn (string $eventName) => match ($eventName) {
                'created' => __('activity.created', [
                    'menu' => __('menu.role'),
                    'identifier' => $this->name,
                    'link' => route('role.show', $this->id),
                ]),
                'updated' => __('activity.updated', [
                    'menu' => __('menu.role'),
                    'identifier' => $this->name,
                    'link' => route('role.show', $this->id),
                ]),
                'deleted' => __('activity.deleted', [
                    'menu' => __('menu.role'),
                    'identifier' => $this->name,
                ]),
            });
    }
}
