<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Definir la tabla
    protected $table = 'orders';

    // Definir los campos que son asignables en masa
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'city',
        'postal_code',
        'country',
        'total_price',
        'status',
        'paypal_transaction_id'
    ];

    // Si usas timestamps automáticos, esta propiedad es opcional
    public $timestamps = true;
        // Relación con los ítems de la orden
        public function items()
        {
            return $this->hasMany(OrderItem::class);
        }
}
