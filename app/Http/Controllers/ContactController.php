<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
            'inquiry_type' => 'required|in:general,project,support,partnership,career',
        ]);

        ContactMessage::create($validated);

        return response()->json(['message' => 'Thank you! Your message has been sent successfully.']);
    }
}
