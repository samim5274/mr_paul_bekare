<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'branch_id',
        'reg',
        'total',
        'discount',
        'vat',
        'payable',
        'pay',
        'due',
        'paymentMethod',
        'status',
        'customerName',
        'customerPhone',
    ];

    public function user()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(PaymentMethod::class, 'paymentMethod', 'id');
    }

    public function dueCollections()
    {
        return $this->hasMany(DueCollection::class);
    }
}
