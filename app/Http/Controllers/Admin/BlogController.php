<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with('author')
            ->latest()
            ->paginate(15);

        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:300',
            'status' => 'required|in:draft,published',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Ensure slug is unique
        $baseSlug = $validated['slug'];
        $count = 1;
        while (BlogPost::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $baseSlug . '-' . $count++;
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        $validated['user_id'] = auth()->id();

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        $post = BlogPost::create($validated);

        ActivityLog::log('created', "Created blog post: {$post->title}", $post);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', "Blog post \"{$post->title}\" created successfully.");
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blog.edit', ['post' => $blog]);
    }

    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('blog_posts', 'slug')->ignore($blog->id)],
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:300',
            'status' => 'required|in:draft,published',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        } else {
            unset($validated['featured_image']);
        }

        // Set published_at when publishing for the first time
        if ($validated['status'] === 'published' && !$blog->published_at) {
            $validated['published_at'] = now();
        }

        $blog->update($validated);

        ActivityLog::log('updated', "Updated blog post: {$blog->title}", $blog);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', "Blog post \"{$blog->title}\" updated successfully.");
    }

    public function destroy(BlogPost $blog)
    {
        $title = $blog->title;

        ActivityLog::log('deleted', "Deleted blog post: {$title}", $blog);

        $blog->delete();

        return redirect()
            ->route('admin.blog.index')
            ->with('success', "Blog post \"{$title}\" deleted successfully.");
    }
}
