<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Souvenir extends Model
{
    
    use SoftDeletes;


    protected $guarded = ['id'];


    protected $cascadeDeletes = ['galleries', 'supplyOutlets'];


    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }


    public function supplyOutlets()
    {
        return $this->hasMany(SupplyOutlet::class);
    }

}
