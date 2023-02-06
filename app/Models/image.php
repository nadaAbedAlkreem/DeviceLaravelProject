<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Device ; 
class image extends Model
{
    use HasFactory;
    use SoftDeletes ; 

    protected $table = "images"; 
    protected $fillable = [
        'id' ,
        'id_Devices'   ,
        'image_url' ,
 
     ];
 
   public function product()
   {
     return $this->belongsTo('App\Models\Device', 'id_Devices');
   }
}
