<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::published()
            ->latest('published_at')
            ->paginate(9);

        return view('site.blog.index', compact('posts'));
    }

    public function show(BlogPost $blog)
    {
        if ($blog->status !== 'published') {
            abort(404);
        }

        $blog->increment('views');

        $relatedPosts = BlogPost::published()
            ->where('id', '!=', $blog->id)
            ->when($blog->category, fn($q) => $q->where('category', $blog->category))
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('site.blog.show', compact('blog', 'relatedPosts'));
    }
}
