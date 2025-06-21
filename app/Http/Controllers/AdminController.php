<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // Ensure this is imported
use App\Models\Lab;

class AdminController extends Controller
{
    public function __construct()
    {
        // Require authentication
        $this->middleware('auth');

        // Restrict to admin users only
        $this->middleware(function ($request, $next) {
            if (!auth()->user()->is_admin) {
                abort(403, 'Unauthorized access.');
            }
            return $next($request);
        });
    }

    // Map-only admin page
    public function index()
    {
        $labs = Lab::all();
        return view('admin', compact('labs'));
    }
}