<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settingsByGroup = Setting::orderBy('group')
            ->orderBy('key')
            ->get()
            ->groupBy('group');

        return view('admin.settings.index', compact('settingsByGroup'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*.key' => 'required|string|exists:settings,key',
            'settings.*.value' => 'nullable|string|max:10000',
        ]);

        $updatedCount = 0;

        foreach ($validated['settings'] as $item) {
            $setting = Setting::where('key', $item['key'])->first();

            if ($setting && $setting->value !== ($item['value'] ?? '')) {
                $oldValue = $setting->value;
                Setting::set($item['key'], $item['value'] ?? '');
                $updatedCount++;

                ActivityLog::log(
                    'updated',
                    "Updated setting [{$item['key']}]",
                    $setting,
                    ['old_value' => $oldValue, 'new_value' => $item['value'] ?? '']
                );
            }
        }

        if ($updatedCount > 0) {
            return redirect()
                ->route('admin.settings.index')
                ->with('success', "{$updatedCount} setting(s) updated successfully.");
        }

        return redirect()
            ->route('admin.settings.index')
            ->with('info', 'No changes were detected.');
    }
}
