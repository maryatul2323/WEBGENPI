<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelObjectCategory extends Model
{

    use SoftDeletes;


    protected $guarded = ['id'];


    protected $cascadeDeletes = ['travelObjects'];


    public function travelObjects()
    {
        return $this->hasMany(TravelObject::class);
    }

}
