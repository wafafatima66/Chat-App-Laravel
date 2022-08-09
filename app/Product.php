<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function agents()
    {
        return $this->belongsToMany(DtbUser::class,ProductAssignUser::class, 'product_id', 'user_id');
    }
}
