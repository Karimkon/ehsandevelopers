<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactMessage::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by inquiry type
        if ($request->filled('inquiry_type')) {
            $query->where('inquiry_type', $request->inquiry_type);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Search by name, email, or subject
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        $messages = $query->latest()->paginate(15)->withQueryString();

        return view('admin.contact-messages.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        // Mark as read if currently new
        if ($contactMessage->status === 'new') {
            $contactMessage->update(['status' => 'read']);

            ActivityLog::log(
                'updated',
                "Marked contact message from {$contactMessage->name} as read",
                $contactMessage
            );
        }

        return view('admin.contact-messages.show', compact('contactMessage'));
    }

    public function respond(Request $request, ContactMessage $contactMessage)
    {
        $validated = $request->validate([
            'admin_response' => 'required|string|max:10000',
        ]);

        $contactMessage->update([
            'admin_response' => $validated['admin_response'],
            'status' => 'responded',
            'responded_at' => now(),
        ]);

        ActivityLog::log(
            'responded',
            "Responded to contact message from {$contactMessage->name} ({$contactMessage->email})",
            $contactMessage
        );

        return redirect()
            ->route('admin.contact-messages.show', $contactMessage)
            ->with('success', 'Response saved successfully.');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $name = $contactMessage->name;

        ActivityLog::log(
            'deleted',
            "Deleted contact message from {$name}",
            $contactMessage
        );

        $contactMessage->delete();

        return redirect()
            ->route('admin.contact-messages.index')
            ->with('success', "Message from {$name} deleted successfully.");
    }
}
