<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exsubcategory extends Model
{
    use HasFactory;
    protected $fillable = ['cat_id','name'];

    public function category()
    {
        return $this->belongsTo(Excategory::class, 'cat_id', 'id');
    }

    public function expenses()
    {
        return $this->HasMany(Expenses::class, 'subcatId', 'id');
    }
}
