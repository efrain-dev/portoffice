<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable =['name','quantity','file','id_brand','price'];

    public  function brand(){
        return $this->belongsTo( Brand::class,'id_brand','id');
    }
    public function getRouteKeyName()
    {
        return 'name';
    }
     public function scopeName($query, $name){

        if($name)
            return $query->where('name','LIKE',"%$name%");

     }
            public function scopeBrand($query, $brand){

        if($brand)
            return $query->where('id_brand','LIKE',"%$brand%");

    }


}
