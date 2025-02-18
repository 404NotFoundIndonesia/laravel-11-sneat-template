<?php

namespace App\Http\Controllers;

use App\Enum\PermissionAction;
use App\Enum\PermissionResource;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('pages.role.index', [
            'items' => Role::query()
                ->search($request->query('q'))
                ->render($request->query('size')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.role.create', [
            'actions' => PermissionAction::cases(),
            'resources' => PermissionResource::cases(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        try {
            $input = $request->validated();

            $role = Role::create(['name' => $input['role']]);
            if (isset($input['permission'])) {
                $role->syncPermissions($input['permission']);
            }

            return redirect()
                ->route('role.index')
                ->with('notification', $this->successNotification('notification.success_create', 'menu.role'));
        } catch (\Throwable $throwable) {
            Log::error($throwable->getMessage());

            return redirect()
                ->route('role.index')
                ->with('notification', $this->failNotification('notification.fail_create', 'menu.role'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): View
    {
        $permissions = [];
        foreach ($role->permissions as $permission) {
            $permissions[$permission->name] = true;
        }

        return view('pages.role.show', [
            'actions' => PermissionAction::cases(),
            'resources' => PermissionResource::cases(),
            'item' => $role,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        $permissions = [];
        foreach ($role->permissions as $permission) {
            $permissions[$permission->name] = true;
        }

        return view('pages.role.edit', [
            'actions' => PermissionAction::cases(),
            'resources' => PermissionResource::cases(),
            'item' => $role,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        try {
            $input = $request->validated();

            $role->update([
                'name' => $input['role'],
            ]);
            if (isset($input['permission'])) {
                $role->syncPermissions($input['permission']);
            }

            return back()
                ->with('notification', $this->successNotification('notification.success_update', 'menu.role'));
        } catch (\Throwable $throwable) {
            Log::error($throwable->getMessage());

            return back()
                ->with('notification', $this->failNotification('notification.fail_update', 'menu.role'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        try {
            $role->delete();

            return redirect()
                ->route('role.index')
                ->with('notification', $this->successNotification('notification.success_delete', 'menu.role'));
        } catch (\Throwable $throwable) {
            Log::error($throwable->getMessage());

            return redirect()
                ->route('role.index')
                ->with('notification', $this->failNotification('notification.fail_delete', 'menu.role'));
        }
    }
}
