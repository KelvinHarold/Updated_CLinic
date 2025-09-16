<?php

namespace App\Http\Controllers\Mama;
use App\Http\Controllers\Controller;
use App\Models\GrowthMonitoring;
use App\Models\Child;
use Illuminate\Http\Request;

class GrowthMonitoringController extends Controller
{
    public function index() {
        $growths = GrowthMonitoring::all();
        return view('growth_monitorings.index', compact('growths'));
    }

    public function create() {
        $children = Child::all();
        return view('growth_monitorings.create', compact('children'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'child_id'=>'required|exists:children,id',
            'weight'=>'required|numeric',
            'height'=>'required|numeric',
            'head_circumference'=>'required|numeric',
            'date'=>'required|date',
        ]);

        GrowthMonitoring::create($validated);
        return redirect()->route('growth_monitorings.index');
    }

    public function edit(GrowthMonitoring $monitoring) {
        $children = Child::all();
        return view('growth_monitorings.edit', compact('monitoring','children'));
    }

    public function update(Request $request, GrowthMonitoring $monitoring) {
        $validated = $request->validate([
            'child_id'=>'required|exists:children,id',
            'weight'=>'required|numeric',
            'height'=>'required|numeric',
            'head_circumference'=>'required|numeric',
            'date'=>'required|date',
        ]);

        $monitoring->update($validated);
        return redirect()->route('growth_monitorings.index');
    }

    public function destroy(GrowthMonitoring $monitoring) {
        $monitoring->delete();
        return redirect()->route('growth_monitorings.index');
    }
}
