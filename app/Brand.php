<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable =['name','description','file'];
    public function getRouteKeyName()
    {
        return 'name';
    }
    public  function product(){
        return $this->belongsTo(Product::class);


    }
    public function scopeName($query, $name){

        if($name)
            return $query->where('name','LIKE',"%$name%");

    }
}
