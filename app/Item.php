<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'name', 'description', 'price','image'
    ];


  

    public function category(){

        return $this->belongsTo("App\Category");

     }


}
