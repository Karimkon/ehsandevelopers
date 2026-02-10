<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::with('category');

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('service_category_id', $request->category_id);
        }

        // Filter by active status
        if ($request->filled('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        }

        // Search by name or description
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        $services = $query->orderBy('sort_order')->paginate(15)->withQueryString();
        $categories = ServiceCategory::orderBy('name')->get();

        return view('admin.services.index', compact('services', 'categories'));
    }

    public function create()
    {
        $categories = ServiceCategory::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string|max:10000',
            'icon' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'string|max:500',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        // Filter out empty feature entries
        if (isset($validated['features'])) {
            $validated['features'] = array_values(array_filter($validated['features'], fn($f) => trim($f) !== ''));
        }

        $service = Service::create($validated);

        ActivityLog::log(
            'created',
            "Created service: {$service->name}",
            $service
        );

        return redirect()
            ->route('admin.services.index')
            ->with('success', "Service \"{$service->name}\" created successfully.");
    }

    public function edit(Service $service)
    {
        $categories = ServiceCategory::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('services', 'slug')->ignore($service->id),
            ],
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string|max:10000',
            'icon' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'string|max:500',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->boolean('is_active');

        // Filter out empty feature entries
        if (isset($validated['features'])) {
            $validated['features'] = array_values(array_filter($validated['features'], fn($f) => trim($f) !== ''));
        }

        $service->update($validated);

        ActivityLog::log(
            'updated',
            "Updated service: {$service->name}",
            $service
        );

        return redirect()
            ->route('admin.services.index')
            ->with('success', "Service \"{$service->name}\" updated successfully.");
    }

    public function destroy(Service $service)
    {
        $name = $service->name;

        // Check if any service requests reference this service
        $requestCount = $service->where('id', $service->id)
            ->whereHas('category') // Ensure relationships are clean
            ->count();

        ActivityLog::log(
            'deleted',
            "Deleted service: {$name}",
            $service
        );

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', "Service \"{$name}\" deleted successfully.");
    }
}
