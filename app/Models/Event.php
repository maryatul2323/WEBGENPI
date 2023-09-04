<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    
    use SoftDeletes;
    use CascadeSoftDeletes;


    protected $guarded = ['id'];


    protected $dates = ['start_date', 'till_date'];


    protected $cascadeDeletes = ['galleries'];


    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

}
