<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelObject extends Model
{

    use SoftDeletes;
    use CascadeSoftDeletes;


    protected $guarded = ['id'];


    protected $cascadeDeletes = ['galleries', 'destinations'];


    public function travelObjectCategory()
    {
        return $this->belongsTo(TravelObjectCategory::class);
    }


    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }


    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }

}
