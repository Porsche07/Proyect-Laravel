<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendars = Calendar::all();
        return view('calendar.index', compact('calendars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('calendar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'status' => 'required|string|max:20',
        ]);

        Calendar::create([
            'date' => $request->input('date'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('calendar.create')->with('success', 'Evento de calendario creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    /**
     * Display the specified resource.
     */
    public function show(Calendar $calendar)
    {
        return view('calendar.show', compact('calendar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendar $calendar)
    {
        return view('calendar.edit', compact('calendar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calendar $calendar)
    {
        $request->validate([
            'date' => 'required|date',
            'status' => 'required|string|max:20',
        ]);

        $calendar->update([
            'date' => $request->input('date'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('calendar.edit', $calendar)->with('success', 'Evento de calendario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $calendar_id)
    {
        $calendar = Calendar::find($calendar_id);
        $calendar->delete();

        return redirect()->route('calendar.index')->with('success', 'Evento de calendario eliminado exitosamente');
    }
}
