<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable =['id_sales','id_product','quantity','subtotal'];
    public  function product(){
        return $this->belongsTo( Product::class,'id_product','id');

    }
    public  function sale(){
        return $this->belongsTo(Product::class);

    }
}
