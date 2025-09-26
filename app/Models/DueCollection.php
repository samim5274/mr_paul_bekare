<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DueCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'reg',
        'due',
        'pay',
        'payment_date',
        'user_id',
        'note',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }
}
