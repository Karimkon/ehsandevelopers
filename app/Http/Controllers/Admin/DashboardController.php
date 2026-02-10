<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use App\Models\ContactMessage;
use App\Models\Service;
use App\Models\ServiceCategory;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_requests' => ServiceRequest::count(),
            'new_requests' => ServiceRequest::where('status', 'new')->count(),
            'total_messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('status', 'new')->count(),
            'total_services' => Service::count(),
            'total_categories' => ServiceCategory::count(),
        ];

        $recentRequests = ServiceRequest::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentRequests', 'recentMessages'));
    }
}
