<?php 
use App\Models\setting ; 


  if(!function_exists('settingWebsiteName')){ 
    function settingWebsiteName(){
        $data = setting::select('value')->where('key','website_name')->first() ; 
       return $data->value; 
    }
}


if(!function_exists('settingWebsiteImage')){ 
    function settingWebsiteImage(){
        $data = setting::select('value')->where('key','website_logo')->first() ; 
       return $data->value; 
    }
}


 

?>