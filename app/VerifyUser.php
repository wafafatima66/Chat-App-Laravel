<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $guarded = [];
 
    public function user()
    {
        return $this->belongsTo('App\DtbUser', 'user_id');
    }
}
