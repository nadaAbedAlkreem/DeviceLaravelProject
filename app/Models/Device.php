<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\image ; 

class Device extends Model
{
    use HasFactory;
    use SoftDeletes ; 
    protected $table = "devices"; 
    protected $fillable = [
        'name' ,
        'code'   ,
         'description'  ,
         'price'  ,
         'discount'  ,
         'Quantity'  ,

     ];
     public function image()
     {
      return $this->hasMany('App\Models\image', 'id_Devices' , 'id');
     }
     public function mainImage()
     {
      return $this->hasOne('App\Models\image', 'id_Devices' , 'id')->where('is_main' ,'==', 1 );
     }
   
   
}
