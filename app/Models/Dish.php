<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['cuisine_type', 'dish_type', 'menu_id', 'category_id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'menu_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
    
}


/* // Importa el modelo Dish
use App\Models\Dish;

// Crea una nueva instancia de Dish
$nuevoPlatillo = new Dish();

// Establece los atributos del platillo
$nuevoPlatillo->cuisine_type = 'Boliviana';
$nuevoPlatillo->dish_type = 'Buffet';
$nuevoPlatillo->menu_id = 1; // Reemplaza con el ID de un menú existente
$nuevoPlatillo->category_id = 1; // Reemplaza con el ID de una categoría existente

// Guarda el platillo en la base de datos
$nuevoPlatillo->save(); */
