<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageContentController extends Controller
{
    public function index()
    {
        $contentBySection = PageContent::orderBy('section')
            ->orderBy('key')
            ->get()
            ->groupBy('section');

        return view('admin.page-content.index', compact('contentBySection'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'contents' => 'required|array',
            'contents.*.id' => 'required|exists:page_contents,id',
            'contents.*.value' => 'nullable|string|max:50000',
        ]);

        $updatedCount = 0;

        foreach ($validated['contents'] as $item) {
            $content = PageContent::find($item['id']);

            if ($content && $content->value !== ($item['value'] ?? '')) {
                $oldValue = $content->value;
                $content->update(['value' => $item['value'] ?? '']);
                $updatedCount++;

                ActivityLog::log(
                    'updated',
                    "Updated page content [{$content->section}.{$content->key}]",
                    $content,
                    ['old_value' => Str::limit($oldValue, 100), 'new_value' => Str::limit($item['value'] ?? '', 100)]
                );
            }
        }

        // Clear all page content cache
        PageContent::clearCache();

        if ($updatedCount > 0) {
            return redirect()
                ->route('admin.page-content.index')
                ->with('success', "{$updatedCount} content item(s) updated successfully.");
        }

        return redirect()
            ->route('admin.page-content.index')
            ->with('info', 'No changes were detected.');
    }
}
