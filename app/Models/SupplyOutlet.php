<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplyOutlet extends Model
{
    
    use SoftDeletes;


    protected $guarded = ['id'];


    public function souvenir()
    {
        return $this->belongsTo(Souvenir::class);
    }


    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

}
