<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'comment', 'order_id'        ];

    // Define relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
        // Relación con el modelo Order
        public function order()
        {
            return $this->belongsTo(Order::class);
        }
}
