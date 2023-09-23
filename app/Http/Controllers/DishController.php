<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Menu;
use App\Models\Category;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Aquí puedes cargar las listas de menús y categorías desde la base de datos y pasarlas a la vista
        $menus = Menu::all();
        $categories = Category::all();

        return view('dishes.create', compact('menus', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cuisine_type' => 'required|string|max:50',
            'dish_type' => 'required|string|max:50',
            'menu_id' => 'required|exists:menus,menu_id',
            'category_id' => 'required|exists:categories,category_id',
        ]);

        Dish::create([
            'cuisine_type' => $request->input('cuisine_type'),
            'dish_type' => $request->input('dish_type'),
            'menu_id' => $request->input('menu_id'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('dish.create')->with('success', 'Plato creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
