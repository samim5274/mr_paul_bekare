<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Branch;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'facebook_id',
        'google_id',
        'github_id',
        'password',
        'photo',
        'phone',
        'address',
        'dob',
        'branch_id',
        'role',
        'status',
        'otp',
        'otp_expires_at',
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'user_id', 'id');
    }

    public function branch()
    {
        return $this->hasMany(Branch::class, 'manager_id', 'id');
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'user_id', 'id');
    }

    public function purchaseorder()
    {
        return $this->hasMany(Purchaseorder::class, 'user_id', 'id');
    }

    public function expenses()
    {
        return $this->hasMany(Admin::class, 'userId', 'id');
    }

    public function branchs(){
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function dueCollections()
    {
        return $this->hasMany(DueCollection::class);
    }

    public function factory()
    {
        return $this->belongsTo(FactoryStock::class);
    }

    public function purchaseReturn()
    {
        return $this->hasMany(PurchaseReturn::class, 'user_id', 'id');
    }

    public function branchTransfers()
    {
        return $this->hasMany(BranchTransfer::class, 'user_id');
    }
}
