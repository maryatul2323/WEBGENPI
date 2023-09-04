<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Travel extends Model
{
    
    use SoftDeletes;
    use CascadeSoftDeletes;


    protected $guarded = ['id'];


    protected $cascadeDeletes = ['notes', 'policies', 'facilities', 'destinations'];


    public function notes()
    {
        return $this->hasMany(Note::class);
    }


    public function policies()
    {
        return $this->hasMany(Policy::class);
    }


    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }


    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }

}
