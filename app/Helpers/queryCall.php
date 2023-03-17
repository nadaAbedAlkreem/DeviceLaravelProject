<?php
use App\Models\Device ; 
use App\Models\User ; 
use App\Models\Category ; 


if(!function_exists('category')){ 
    function category(){
        $category  = Category::get() ; 
       return  $category; 
    }
}


?>