<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lodging extends Model
{
    
    use SoftDeletes;
    use CascadeSoftDeletes;


    protected $guarded = ['id'];


    protected $cascadeDeletes = ['facilities', 'galleries'];


    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }


    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

}
