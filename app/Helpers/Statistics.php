<?php
use App\Models\Device ; 
use App\Models\User ; 



if(!function_exists('statusDevice')){ 
    function statusDevice(){
        $result = Device::select('id')->get()  ; 
       return $result->count(); 
    }
}

if(!function_exists('statusUser')){ 
    function statusUser(){
        $result = User::select('id')->where('TypeUser' , '<>' , 'admin')->get()  ; 
       return $result->count(); 
    }
}








?>