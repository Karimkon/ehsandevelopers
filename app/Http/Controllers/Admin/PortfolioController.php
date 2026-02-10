<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use App\Models\ServiceCategory;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PortfolioController extends Controller
{
    public function index()
    {
        $items = PortfolioItem::with('category')
            ->orderBy('sort_order')
            ->latest()
            ->paginate(15);

        return view('admin.portfolio.index', compact('items'));
    }

    public function create()
    {
        $categories = ServiceCategory::orderBy('name')->get();

        return view('admin.portfolio.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolio_items,slug',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'client_name' => 'nullable|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|string|max:500',
            'service_category_id' => 'nullable|exists:service_categories,id',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Ensure slug is unique
        $baseSlug = $validated['slug'];
        $count = 1;
        while (PortfolioItem::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $baseSlug . '-' . $count++;
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('portfolio', 'public');
        }

        // Convert comma-separated technologies to JSON array
        if (!empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $item = PortfolioItem::create($validated);

        ActivityLog::log('created', "Created portfolio project: {$item->title}", $item);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', "Project \"{$item->title}\" created successfully.");
    }

    public function edit(PortfolioItem $portfolio)
    {
        $categories = ServiceCategory::orderBy('name')->get();

        return view('admin.portfolio.edit', ['item' => $portfolio, 'categories' => $categories]);
    }

    public function update(Request $request, PortfolioItem $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('portfolio_items', 'slug')->ignore($portfolio->id)],
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'client_name' => 'nullable|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|string|max:500',
            'service_category_id' => 'nullable|exists:service_categories,id',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('portfolio', 'public');
        } else {
            unset($validated['featured_image']);
        }

        // Convert comma-separated technologies to JSON array
        if (!empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        } else {
            $validated['technologies'] = null;
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $portfolio->update($validated);

        ActivityLog::log('updated', "Updated portfolio project: {$portfolio->title}", $portfolio);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', "Project \"{$portfolio->title}\" updated successfully.");
    }

    public function destroy(PortfolioItem $portfolio)
    {
        $title = $portfolio->title;

        ActivityLog::log('deleted', "Deleted portfolio project: {$title}", $portfolio);

        $portfolio->delete();

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', "Project \"{$title}\" deleted successfully.");
    }
}
