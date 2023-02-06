<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\image ; 
use App\Models\Device ; 

class ImageController extends Controller
{
    public function view(Request $request){
        $data_view = Device::select('*')->get();
    

        if ($request->ajax()) {
          $data = image::select('*');
        
 
  
      
          if ($request->ajax()) {
            $data = Device::select('*');
    
            return Datatables::of($data)
                    ->addIndexColumn()
     
                    ->filter(function ($instance) use ($request) {
                   if (!empty($request->get('category')) && $request->get('category') <> -1 ) {
                        $instance->where('category_id', $request->get('category'));
                    }
                    if (!empty($request->get('search')) ) { 
                      $search =$request->get('search');
                      $instance->where('name','like' , "%$search%");
                  }
                    })
                    ->addColumn('action', function ($data) {
                      return '
                      <a href="/'.$data->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                      <meta name="csrf-token" content="{{ csrf_token() }}">
        
                      <button class="deleteRecord btn btn-xs btn-danger show_confirm"    data-id="'.$data->id.'" >Delete </button>
                       
                      ';
                      
                    })
                    ->addColumn('image', function ($data) { 
                      $url=asset("/my_custom_symlink_1/$data->image"); 
                      return ' <img class="profile-user-img img-fluid "
                      src='.$url.'   alt="User  picture"> '; 
                  })
              
                    
                  ->rawColumns(['image', 'action'])
                  ->make(true);
                  }
           return  view('images.view' ,['data' =>$data_view] ) ; 
                }
         }













}
