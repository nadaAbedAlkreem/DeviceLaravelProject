<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use  App\Models\Device ; 
class Category extends Model
{
    use HasFactory;
    use SoftDeletes ; 

    protected $table = "categories"; 
    public function Device()
    {
     return $this->hasMany('App\Models\Device', 'category_id' , 'id');
    }

}
