<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting ;
use  App\Http\Traits\QueryTrait ; 
use App\Http\Requests\SettingRequest ; 
use Illuminate\Support\Facades\Storage;


class SettingController extends Controller
{


    public function store(SettingRequest $request){
        $name_website = $request['website_name']; 
        $logo = $request->file('website_logo') ; 
         
     
       if($name_website){
        $update  = setting::where('key'  ,'website_name' )->update([
            'value' =>$name_website  
         ]);

        }
        if($logo){
            $path = 'uploads/images/';
            $name_image = time()+rand(1,10000000).'.'.  $logo->getClientOriginalExtension(); 
            Storage::disk('local')->put($path.$name_image, file_get_contents(  $logo ));
         $update  = setting::where('key'  ,'website_logo' )->update([
            'value' =>$name_image 
         ]);
        }
          if(!$update){

            return redirect()->back()->with(['statusS' => false]) ;


        }
        return redirect()->back()->with(['statusS' => true]) ;


    
    }

    public function  show(){

       

        return view('components.sideBar') ; 


    }

    

}
