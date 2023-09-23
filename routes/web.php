<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

// Rutas para los eventos de calendario
Route::resource('calendar', CalendarController::class);

// Ruta para mostrar el formulario de creación de eventos de calendario
Route::get('calendar/create', [CalendarController::class, 'create'])->name('calendar.create');

// Ruta para procesar el formulario y agregar un evento de calendario
Route::post('calendar', [CalendarController::class, 'store'])->name('calendar.store');

// Ruta para mostrar un evento de calendario específico
Route::get('calendar/{calendar}', [CalendarController::class, 'show'])->name('calendar.show');

// Ruta para mostrar el formulario de edición de un evento de calendario
Route::get('calendar/{calendar}/edit', [CalendarController::class, 'edit'])->name('calendar.edit');

// Ruta para actualizar un evento de calendario
Route::put('calendar/{calendar}', [CalendarController::class, 'update'])->name('calendar.update');

// Ruta para eliminar un evento de calendario
Route::delete('calendar/{calendar}', [CalendarController::class, 'destroy'])->name('calendar.destroy');



// Rutas para los turnos (shifts)
Route::resource('shifts', ShiftController::class);

// Ruta para mostrar el formulario de creación de turnos
Route::get('shifts/create', [ShiftController::class, 'create'])->name('shifts.create');
Route::post('/shifts', [ShiftController::class, 'store'])->name('shifts.store');
Route::get('/shifts', [ShiftController::class, 'index'])->name('shifts.index');
// Rutas para los turnos (shifts)
Route::get('shifts/{shift}/edit', [ShiftController::class, 'edit'])->name('shifts.edit');
Route::put('shifts/{shift}', [ShiftController::class, 'update'])->name('shifts.update');
Route::delete('shifts/{shift}', [ShiftController::class, 'destroy'])->name('shifts.destroy');

// Ruta para mostrar el formulario de creación del menú
Route::get('/menus/create', [MenuController::class, 'create'])->name('menus.create');

// Ruta para procesar el formulario y agregar el menú
Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');

// Rutas para las categorías
Route::resource('categories', CategoryController::class);

// Ruta para mostrar el formulario de creación de categorías
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');

// Ruta para procesar el formulario y agregar una categoría
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');


// Rutas para los platos (dishes)
Route::resource('dishes', DishController::class);

// Ruta para mostrar el formulario de creación de platos
Route::get('dish/create', [DishController::class, 'create'])->name('dish.create');

// Ruta para procesar el formulario y agregar un plato
Route::post('dish', [DishController::class, 'store'])->name('dish.store');

Route::resource('users', UserController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('reviews', ReviewController::class);

