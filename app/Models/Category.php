<?php

// app/Models/Category.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada en la base de datos
    protected $table = 'categories';

    // Atributos que pueden ser asignados masivamente
    protected $fillable = ['name'];

    // Relación con los productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
