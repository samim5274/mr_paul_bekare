<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasecart extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',

        'user_id',
        'chalan_reg',
        'product_id',
        'branch',

        'order_qty',
        'ready_qty',
        'delivery_qty',
        
        'status',
        'remark',
        'unit_price',
        'total_price',
        'unit',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function branchs()
    {
        return $this->belongsTo(Branch::class, 'branch', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }
}
