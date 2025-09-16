<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mama;
use App\Models\Child;
use App\Models\Appointment;

class NGOController extends Controller
{
    // Dashboard view
    public function dashboard()
    {
        $totalMamas = Mama::count();
        $totalChildren = Child::count();
        $completedAppointments = Appointment::where('status', 'completed')->count();
        $pendingAppointments = Appointment::where('status', 'pending')->count();

        return view('dashboard.ngo', compact(
            'totalMamas', 'totalChildren', 'completedAppointments', 'pendingAppointments'
        ));
    }

    // Detailed health reports
    public function reports()
    {
        $mamas = Mama::with('children', 'appointments')->get();
        // Hapa unaweza ku-calculate stats au ku-generate reports za export

        return view('ngo.reports', compact('mamas'));
    }
}
