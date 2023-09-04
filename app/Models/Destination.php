<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    
    use SoftDeletes;


    protected $guarded = ['id'];


    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }


    public function travelObject()
    {
        return $this->belongsTo(TravelObject::class);
    }

}
