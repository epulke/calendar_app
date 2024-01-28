<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller {

    public function createForm()
    {
        return view('calendars.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:128',
        ]);

        Calendar::create([
            'name' => $request->input('name'),
            'userid' => auth()->id(), // Assuming you're using authentication
        ]);

        return redirect()->route('calendars.index')->with('success', 'Calendar created successfully');
    }
}
