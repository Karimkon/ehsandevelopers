<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrustedClient;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class TrustedClientController extends Controller
{
    public function index()
    {
        $clients = TrustedClient::orderBy('sort_order')->latest()->paginate(20);

        return view('admin.trusted-clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.trusted-clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'industry'   => 'nullable|string|max:255',
            'logo'       => 'nullable|image|max:1024',
            'sort_order' => 'nullable|integer|min:0',
            'is_active'  => 'nullable|boolean',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('trusted-clients', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $client = TrustedClient::create($validated);

        ActivityLog::log('created', "Added trusted client: {$client->name}", $client);

        return redirect()
            ->route('admin.trusted-clients.index')
            ->with('success', "\"{$client->name}\" added successfully.");
    }

    public function edit(TrustedClient $trustedClient)
    {
        return view('admin.trusted-clients.edit', ['client' => $trustedClient]);
    }

    public function update(Request $request, TrustedClient $trustedClient)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'industry'   => 'nullable|string|max:255',
            'logo'       => 'nullable|image|max:1024',
            'sort_order' => 'nullable|integer|min:0',
            'is_active'  => 'nullable|boolean',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('trusted-clients', 'public');
        } else {
            unset($validated['logo']);
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $trustedClient->update($validated);

        ActivityLog::log('updated', "Updated trusted client: {$trustedClient->name}", $trustedClient);

        return redirect()
            ->route('admin.trusted-clients.index')
            ->with('success', "\"{$trustedClient->name}\" updated successfully.");
    }

    public function destroy(TrustedClient $trustedClient)
    {
        $name = $trustedClient->name;

        ActivityLog::log('deleted', "Removed trusted client: {$name}", $trustedClient);

        $trustedClient->delete();

        return redirect()
            ->route('admin.trusted-clients.index')
            ->with('success', "\"{$name}\" removed successfully.");
    }
}
