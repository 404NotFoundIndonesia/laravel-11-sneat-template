<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('pages.user.index', [
            'items' => User::with('roles')
                ->search($request->query('q'))
                ->render($request->query('size')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.user.create', [
            'roles' => Role::all()->map(fn ($r) => [$r->name, $r->name]),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        try {
            $input = $request->validated();
            $role = $input['role'];
            unset($input['role']);

            $user = User::query()->create([
                ...$input,
                'password' => Hash::make('password'),
            ]);

            $user->assignRole($role);

            return redirect()
                ->route('user.index')
                ->with('notification', $this->successNotification('notification.success_create', 'menu.user'));
        } catch (\Throwable $throwable) {
            Log::error($throwable->getMessage());

            return redirect()
                ->route('user.index')
                ->with('notification', $this->failNotification('notification.fail_create', 'menu.user'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        $user->load(['roles']);

        return view('pages.user.show', [
            'item' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $user->load(['roles']);

        return view('pages.user.edit', [
            'roles' => Role::all()->map(fn ($r) => [$r->name, $r->name]),
            'item' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        try {
            $input = $request->validated();
            $role = $input['role'];
            unset($input['role']);

            $user->update($input);

            $user->syncRoles([$role]);
            $user->assignRole($role);

            return back()
                ->with('notification', $this->successNotification('notification.success_update', 'menu.user'));
        } catch (\Throwable $throwable) {
            Log::error($throwable->getMessage());

            return back()
                ->with('notification', $this->failNotification('notification.fail_update', 'menu.user'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        try {
            $user->delete();

            return redirect()
                ->route('user.index')
                ->with('notification', $this->successNotification('notification.success_delete', 'menu.user'));
        } catch (\Throwable $throwable) {
            Log::error($throwable->getMessage());

            return redirect()
                ->route('user.index')
                ->with('notification', $this->failNotification('notification.fail_delete', 'menu.user'));
        }
    }
}
