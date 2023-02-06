<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User ; 
use App\Models\setting ; 

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest ; 
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Storage;
use Validator;



class ProfileController extends Controller
{ 
    
    public function profileView(){
        $raw = setting::select('*')->get() ; 
            
   
         return view('profile', ['setting' => $raw]) ; 
    }

   
    public function updateProfile(ProfileRequest $request, $id){
      $image = $request['imageUser'] ; 
      $user = User::find($id);

      if(!empty($image)){
        $path = 'uploads/images/';
        $name_image = time()+rand(1,10000000).'.'.  $image->getClientOriginalExtension(); 
        Storage::disk('local')->put($path.$name_image, file_get_contents( $image ));
        $user->image = $name_image;
        $user->save() ; 
       }
    
        if(!$user instanceof User){
            return redirect()->back();
        }
        $user->fill($request->all());
        if(!$user->save()){
            return redirect()->back()->with(['status' => false]) ;
        }
        if(!empty($request['password']) && !empty($request['password_confirm'])){
           $user->password = Hash::make($request['password']);
           if(!$user->save()){
                return redirect()->back()->with(['status' => false]) ;
           }
          
        }
  
        return redirect()->back()->with(['status' => true]);    
    }
}
