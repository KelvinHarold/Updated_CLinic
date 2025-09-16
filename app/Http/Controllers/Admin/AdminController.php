<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalDoctors = User::role('Doctor')->count();
        $totalMamas = User::role('Pregnant')->count() + User::role('Breastfeeding')->count();

        return view('admin.dashboard', compact('totalUsers','totalDoctors','totalMamas'));
    }
}
