<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $query = ActivityLog::with('user');

        // Filter by action type
        if ($request->filled('action')) {
            $query->where('action', $request->action);
        }

        // Filter by model type
        if ($request->filled('model_type')) {
            $query->where('model_type', $request->model_type);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Search by description
        if ($request->filled('search')) {
            $query->where('description', 'like', "%{$request->search}%");
        }

        $logs = $query->latest()->paginate(25)->withQueryString();

        // Get distinct action types for the filter dropdown
        $actionTypes = ActivityLog::distinct('action')->pluck('action')->sort()->values();

        // Get distinct model types for the filter dropdown
        $modelTypes = ActivityLog::whereNotNull('model_type')
            ->distinct('model_type')
            ->pluck('model_type')
            ->map(fn($type) => class_basename($type))
            ->sort()
            ->values();

        return view('admin.activity-logs.index', compact('logs', 'actionTypes', 'modelTypes'));
    }
}
