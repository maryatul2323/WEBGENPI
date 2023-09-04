<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    
    use SoftDeletes;


    protected $guarded = ['id'];


    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }


    public function lodging()
    {
        return $this->belongsTo(Lodging::class);
    }

}
