<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

   

    public function union()
    {
        return $this->belongsTo(Union::class, 'union_id','id');
    }
    public function upazila()
    {
        return $this->belongsTo(Upazila::class, 'upazila_id','id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id','id');
    }
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id','id');    
    }

    static function getStatus()
    {
        return $status = [
            '0' => 'New Processing',
            '1' => 'Confirm',
            '2' => 'Cancel',
            '3' => 'Recall',
            '4' => 'Approve',
            '5' => 'Double',
            '6' => 'Spam'
        ];
    }
}
