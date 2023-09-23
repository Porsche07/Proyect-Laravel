<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\Calendar;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = Shift::all();
        return view('shift.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $calendars = Calendar::all(); // Obtener la lista de calendarios
        return view('shift.create', compact('calendars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'calendar_id' => 'required|exists:calendars,calendar_id',
            'opening_time' => 'required|date_format:H:i',
            'closing_time' => 'required|date_format:H:i|after:opening_time',
        ]);

        Shift::create([
            'calendar_id' => $request->input('calendar_id'),
            'opening_time' => $request->input('opening_time'),
            'closing_time' => $request->input('closing_time'),
        ]);

        // Redirigir a la ruta de la lista de turnos después de crear con éxito
        return redirect()->route('shifts.index')->with('success', 'Turno creado exitosamente');

        // En caso de error:
        // return redirect()->route('shift.create')->with('error', 'Error al crear el turno, verifica los datos');
    }


    /**
     * Display the specified resource.
     */
    public function show($shift_id)
    {
        $shift = Shift::find($shift_id);
        return view('shift.show', compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($shift_id)
    {
        $shift = Shift::find($shift_id);
        $calendars = Calendar::all();
        return view('shift.edit', compact('shift', 'calendars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'calendar_id' => 'required|exists:calendars,calendar_id',
            'opening_time' => 'required|date_format:H:i',
            'closing_time' => 'required|date_format:H:i|after:opening_time',
        ]);

        $shift = Shift::findOrFail($id);
        $shift->calendar_id = $request->input('calendar_id');
        $shift->opening_time = $request->input('opening_time');
        $shift->closing_time = $request->input('closing_time');
        $shift->save();

        return redirect()->route('shifts.edit', $id)->with('success', 'Turno actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shift = Shift::findOrFail($id);
        $shift->delete();

        return redirect()->route('shifts.index')->with('success', 'Turno eliminado exitosamente');
    }
}
