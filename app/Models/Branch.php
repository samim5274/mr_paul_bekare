<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'phone',
        'manager_id',
    ];

    public function manager()
    {
        return $this->belongsTo(Admin::class, 'manager_id', 'id');
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'branch_id', 'id');
    }

    public function purchasecart()
    {
        return $this->hasMany(Branch::class, 'branch_id', 'id');
    }

    public function admins(){
        return $this->hasMany(Admin::class, 'branch_id', 'id');
    }
}
