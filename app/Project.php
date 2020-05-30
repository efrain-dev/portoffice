<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{


    protected $fillable =['title','description','status'];
    public function getRouteKeyName()
    {
        return 'title';
    }

}
