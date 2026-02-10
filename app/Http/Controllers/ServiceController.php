<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function show(Service $service)
    {
        if (!$service->is_active) {
            abort(404);
        }

        $service->load('category');

        return view('site.services.show', compact('service'));
    }
}
