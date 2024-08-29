<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada en la base de datos
    protected $table = 'products';

    // Atributos que pueden ser asignados masivamente
    protected $fillable = ['name', 'description', 'price', 'category_id', 'image'];

    // Relación con la categoría (si existe un modelo Category)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
