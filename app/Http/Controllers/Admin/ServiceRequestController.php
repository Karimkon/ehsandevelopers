<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = ServiceRequest::with('service');

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by priority
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Search by name, email, reference number, or company
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('reference_number', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%");
            });
        }

        $requests = $query->latest()->paginate(15)->withQueryString();

        return view('admin.service-requests.index', compact('requests'));
    }

    public function show(ServiceRequest $serviceRequest)
    {
        $serviceRequest->load('service');

        return view('admin.service-requests.show', compact('serviceRequest'));
    }

    public function update(Request $request, ServiceRequest $serviceRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,reviewing,quoted,in_progress,completed,cancelled',
            'priority' => 'sometimes|in:low,medium,high,urgent',
            'admin_notes' => 'nullable|string|max:5000',
            'quoted_amount' => 'nullable|numeric|min:0',
        ]);

        $oldStatus = $serviceRequest->status;
        $serviceRequest->update($validated);

        ActivityLog::log(
            'updated',
            "Updated service request {$serviceRequest->reference_number} (status: {$oldStatus} -> {$validated['status']})",
            $serviceRequest,
            ['old_status' => $oldStatus, 'new_status' => $validated['status']]
        );

        return redirect()
            ->route('admin.service-requests.show', $serviceRequest)
            ->with('success', 'Service request updated successfully.');
    }

    public function destroy(ServiceRequest $serviceRequest)
    {
        $reference = $serviceRequest->reference_number;

        ActivityLog::log(
            'deleted',
            "Deleted service request {$reference}",
            $serviceRequest
        );

        $serviceRequest->delete();

        return redirect()
            ->route('admin.service-requests.index')
            ->with('success', "Service request {$reference} deleted successfully.");
    }
}
