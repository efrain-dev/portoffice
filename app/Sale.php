<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable =['name','address','quantity','total'];


    public function scopeName($query, $name){

        if($name)
            return $query->where('name','LIKE',"%$name%");

    }


    public  function product(){
        return $this->belongsTo(Product::class);

    }
}

