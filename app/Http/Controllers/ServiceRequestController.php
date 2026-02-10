<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function create()
    {
        $categories = ServiceCategory::where('is_active', true)->orderBy('sort_order')->get();
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();

        return view('site.request-service', compact('categories', 'services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'service_id' => 'required|exists:services,id',
            'project_description' => 'required|string|max:10000',
            'budget_range' => 'nullable|string|max:100',
            'timeline' => 'nullable|string|max:100',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'privacy_accepted' => 'accepted',
        ]);

        unset($validated['privacy_accepted']);

        $validated['reference_number'] = ServiceRequest::generateReferenceNumber();

        // Handle file attachments
        if ($request->hasFile('attachments')) {
            $paths = [];
            foreach ($request->file('attachments') as $file) {
                $paths[] = $file->store('service-requests', 'public');
            }
            $validated['attachments'] = $paths;
        }

        $serviceRequest = ServiceRequest::create($validated);

        return response()->json([
            'message' => 'Your service request has been submitted successfully!',
            'reference_number' => $serviceRequest->reference_number,
        ]);
    }

    public function confirmation(string $referenceNumber)
    {
        $serviceRequest = ServiceRequest::where('reference_number', $referenceNumber)->firstOrFail();
        return view('site.request-confirmation', compact('serviceRequest'));
    }
}
