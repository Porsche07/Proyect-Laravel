<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $primaryKey = 'calendar_id';
    protected $fillable = ['date', 'status'];

}



/* Para crear un nuevo registro, puedes usar la siguiente sintaxis:
$calendar = new App\Models\Calendar;
$calendar->date = '2023-09-25'; // Cambia esta fecha por la que desees
$calendar->status = 'Activo'; // Cambia el estado por el que desees
$calendar->save();

Para obtener todos los registros, simplemente utiliza:
$calendars = App\Models\Calendar::all();

Para actualizar un registro existente, primero obtén el registro que deseas actualizar, modifica los valores y luego guarda los cambios:
$calendar = App\Models\Calendar::find(1); // Reemplaza 1 con el ID del registro que deseas actualizar
$calendar->date = '2023-09-26'; // Nueva fecha
$calendar->status = 'Inactivo'; // Nuevo estado
$calendar->save();


Para eliminar un registro, puedes usar el método delete() en el modelo:
$calendar = App\Models\Calendar::find(1); // Reemplaza 1 con el ID del registro que deseas eliminar
$calendar->delete(); */
