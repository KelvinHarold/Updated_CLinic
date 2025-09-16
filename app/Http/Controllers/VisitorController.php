<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    // Dashboard ya Visitor
    public function dashboard()
    {
        $visitor = Auth::user();
        $relativesCount = $visitor->relatives()->count(); // count ya mamas wake

        return view('dashboard.visitor', compact('relativesCount'));
    }

    // Ona relatives (Mamas) wa visitor
    public function relatives()
    {
        $visitor = Auth::user();
        $relatives = $visitor->relatives()->with('appointments')->get();

        return view('visitors.relatives', compact('relatives'));
    }
}
