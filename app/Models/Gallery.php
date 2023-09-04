<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    
    use SoftDeletes;


    protected $guarded = ['id'];


    public function travelObject()
    {
        return $this->belongsTo(TravelObject::class);
    }


    public function souvenir()
    {
        return $this->belongsTo(Souvenir::class);
    }


    public function event()
    {
        return $this->belongsTo(Event::class);
    }


    public function lodging()
    {
        return $this->belongsTo(Lodging::class);
    }

}
