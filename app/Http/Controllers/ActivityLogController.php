<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('pages.log.index', [
            'items' => ActivityLog::query()
                ->causedBy($request->user())
                ->search($request->query('q'))
                ->render($request->query('size')),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityLog $log): RedirectResponse
    {
        try {
            $log->delete();

            return back()
                ->with('notification', $this->successNotification('notification.success_delete', 'menu.activity_log'));
        } catch (\Throwable $throwable) {
            Log::error($throwable->getMessage());

            return back()
                ->with('notification', $this->failNotification('notification.fail_delete', 'menu.activity_log'));
        }
    }

    public function destroyBulk(Request $request): RedirectResponse
    {
        try {
            ActivityLog::query()->delete();

            return back()
                ->with('notification', $this->successNotification('notification.success_delete', 'menu.activity_log'));
        } catch (\Throwable $throwable) {
            Log::error($throwable->getMessage());

            return back()
                ->with('notification', $this->failNotification('notification.fail_delete', 'menu.activity_log'));
        }
    }
}
