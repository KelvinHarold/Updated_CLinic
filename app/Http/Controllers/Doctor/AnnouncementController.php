<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index() {
        $announcements = Announcement::all();
        return view('announcements.index', compact('announcements'));
    }

    public function create() {
        return view('announcements.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'date'=>'required|date'
        ]);

        $validated['user_id'] = auth()->id();
        Announcement::create($validated);
        return redirect()->route('announcements.index');
    }

    public function edit(Announcement $announcement) {
        return view('announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement) {
        $validated = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'date'=>'required|date'
        ]);

        $announcement->update($validated);
        return redirect()->route('announcements.index');
    }

    public function destroy(Announcement $announcement) {
        $announcement->delete();
        return redirect()->route('announcements.index');
    }

    public function mamaIndex()
{
    // Mama anaona matangazo yote
    $announcements = Announcement::orderBy('date', 'desc')->get();
    return view('announcements.mama_annoucements', compact('announcements'));
}

}
