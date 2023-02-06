<?php 
namespace App\Http\Traits;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


/**
 * 
 */
trait QueryTrait
{
    
  
    public function storeImageFile($image){
             
          $path = 'uploads/images/';
          $name_image = time()+rand(1,10000000).'.'.$image->getClientOriginalExtension(); 
          Storage::disk('local')->put($path.$name_image, file_get_contents($image));
              return $name_image ; 
        

           
    }
}
