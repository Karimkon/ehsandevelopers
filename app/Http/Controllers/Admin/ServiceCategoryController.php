<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::withCount('services')
            ->orderBy('sort_order')
            ->paginate(15);

        return view('admin.service-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.service-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:service_categories,slug',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:2000',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $category = ServiceCategory::create($validated);

        ActivityLog::log(
            'created',
            "Created service category: {$category->name}",
            $category
        );

        return redirect()
            ->route('admin.service-categories.index')
            ->with('success', "Category \"{$category->name}\" created successfully.");
    }

    public function edit(ServiceCategory $serviceCategory)
    {
        return view('admin.service-categories.edit', compact('serviceCategory'));
    }

    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('service_categories', 'slug')->ignore($serviceCategory->id),
            ],
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:2000',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->boolean('is_active');

        $serviceCategory->update($validated);

        ActivityLog::log(
            'updated',
            "Updated service category: {$serviceCategory->name}",
            $serviceCategory
        );

        return redirect()
            ->route('admin.service-categories.index')
            ->with('success', "Category \"{$serviceCategory->name}\" updated successfully.");
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        // Prevent deletion if category has services
        if ($serviceCategory->services()->count() > 0) {
            return redirect()
                ->route('admin.service-categories.index')
                ->with('error', "Cannot delete \"{$serviceCategory->name}\" because it has associated services. Remove or reassign them first.");
        }

        $name = $serviceCategory->name;

        ActivityLog::log(
            'deleted',
            "Deleted service category: {$name}",
            $serviceCategory
        );

        $serviceCategory->delete();

        return redirect()
            ->route('admin.service-categories.index')
            ->with('success', "Category \"{$name}\" deleted successfully.");
    }
}
