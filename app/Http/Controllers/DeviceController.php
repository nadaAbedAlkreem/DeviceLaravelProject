<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Device ;
use App\Models\Category ; 
use Illuminate\Support\Str;
use App\Models\image ; 
use DataTables;
use App\Http\Requests\DevicesRequest ; 
use Illuminate\Support\Facades\Storage;
 use Illuminate\Support\Facades\Redirect;
use App  ; 

class DeviceController extends Controller
{
    public function view(Request $request){
      $data_view = Category::select('*')->get();
      $data = Device::with("mainImage")->get();
     
        
      if ($request->ajax()) {
        
        $data = Device::with("mainImage");
        
    
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
                  <a href="/'.$data->id.'/edit" class="btn btn-xs btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                </svg></a>
                  <meta name="csrf-token" content="{{ csrf_token() }}">
    
                  <button class="deleteRecord btn btn-xs btn-danger show_confirm"    data-id="'.$data->id.'" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg> </button>
                 <a href="/'.$data->id.'/details" class="btn btn-xs btn-warning"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                 <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                 <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                 </svg> </a>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                     ';
                  
                })
             
                ->addColumn('image', function ($data) { 
                  // $name =$data->mainImage->image_url ?? ''; 
                  // // foreach($data as $item )   {
                  // //   foreach($item->image as $item_ ){
                  // //     $name = $item_->image_url ; 
                  // //     dd($name);

            
                  // //   }
                  // // }
                   $rowImage = image::where('id_Devices' , $data->id)->where('is_main' , 1 )->first() ;
                   $image = $rowImage->image_url ?? '' ; 
                   $url=asset("/my_custom_symlink_1/$image"); 
                  return ' <img class="profile-user-img img-fluid "
                  src='.$url.'   alt="User  picture"> '; 
               
                  

         
              })
          
                
              ->rawColumns(['image', 'action'])
              ->make(true);
              }
    
         
         return  view('devices.ViewDevices' ,['data' =>$data_view] ) ; 
       }

   public function formDevices(){
    $data_view = Category::select('*')->where('level' , '<>' , '0')->get();
 
    return  view('devices.AddDevices', ['data' =>$data_view] ) ; 

   }
       // if(isset($image)){
    //   $path = 'uploads/images/';
    //   $name_image = time()+rand(1,10000000).'.'.$image->getClientOriginalExtension();
    //  Storage::disk('local')->put($path.$name_image, file_get_contents( $image ));
    //    $device->image =  $name_image;
    //   }
   public function addActionDevice(DevicesRequest $request ){
     $image_ = $request->file('image') ; 
     $category =  $request['category_id'] ;  
      $device = new Device()  ; 
      $device->category_id =$category ;
       if($request['discount']){
         $device->discount =  $request['discount']  / 100 ;
        }
      $device->fill($request->all());
      $status = $device->save() ; 
       $level = 0 ; 
      foreach ($request->file('image') as $imagefile) {
       $image = new image();
       $path = 'uploads/images/';
       $name_image = time()+rand(1,10000000).'.'.$imagefile->getClientOriginalExtension();
       Storage::disk('local')->put($path.$name_image, file_get_contents( $imagefile ));
        if($level == 0 ){
            $image->is_main = 1 ; 
        }
       $image->image_url = $name_image;
       $image->id_Devices = $device->id;
       $image->save();
       $level++ ; 
    }
       return  redirect()->back()->with(['status'=>$status]) ; 
   }


    public function formEditDevices($id){
       $data_view = Category::where('level' ,'<>' , '0')->get() ; 
      $row = Device::where('id' , $id)->get() ; 

     return view('devices.EditDevices' , ['data' =>$data_view , 'row' =>$row]) ;

    }
 
    public function actionEditDevices(Request $request )
    {
     $id = $request['id'] ; 
     $image = $request->file('image') ; 
     $request_data = $request->except('image');
      $device = Device::find($id);
     
    if(isset($image)){
      $path = 'uploads/images/';
      $name_image = time()+rand(1,10000000).'.'.$image->getClientOriginalExtension();
       Storage::disk('local')->put($path.$name_image, file_get_contents( $image ));
       $request_data['image'] = $name_image;
     }
        if(!$device instanceof Device){
           return redirect()->back();
       }
       if($request['discount']){
        $device->discount =  $request['discount']  / 100 ;

       }
       if ($request['category_id'] != 0){
          $device->category_id =  $request['category_id'] ;
         
         
       }
   
       $device->fill($request_data);
       if(!$device->save()){
         return redirect()->back()->with(['status' => false  ]) ;
    }else{
 
       return redirect()->back()->with(['status' => true ]);  
    }
      
    }






   public function viewDetailsDevice($id , Request $request){
    $device_details = Device::with('image')->where("id" , $id)->get(); 
 

    if ($request->ajax()) {
      $id =$request->get('id');

      $data =  image::select('*')->where("id_Devices" , $id);
      
       
  
      return Datatables::of($data)
      
              ->addIndexColumn()

             
              ->addColumn('action', function ($data) {
                return '
                <button class="deleteRecord btn btn-xs btn-danger show_confirm"    data-id="'.$data->id.'" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg> </button>
           
                   ';
                
              })
           
              ->addColumn('image', function ($data) { 
           
                     
                $url=asset("/my_custom_symlink_1/$data->image_url"); 
                return ' <img class="profile-user-img img-fluid "
                src='.$url.'   alt="User  picture"> '; 
             
                

       
            })
            ->addColumn('is_main', function ($data) { 
              if ($data->is_main == 1 ){
                return  '<button class="mainStarUpdate btn btn-xs  btn btn-light show_confirm"   data-id="'.$data->id.'" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
                </button>
                ';
              }else{
                return '
                <button class="mainStarUpdate btn btn-xs  btn btn-light  show_confirm" align="center"   data-id="'.$data->id.'" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg>
                </button>                
                
                
                
                ' ; 
              }
            
                     
           
              

     
          })
      
        
              
            ->rawColumns(['image'  ,'is_main','action'])
            ->make(true);
            }
  

    return view('devices.DetailsDevice' , ['data' => $device_details] ) ; 
   }

   
   public function delete($id){
   $result =  Device::find($id)->delete($id);
  
    if($result){
      return response()->json([
          'success' => 'Record deleted successfully!'
      ]);
    }else{
      return response()->json([
        'falid ' => 'Record deleted falid!'
    ]);
  }
  
   }


   public function deleteImage($id){
    $result =  image::find($id)->delete($id);
   
     if($result){
       return response()->json([
           'success' => 'Record deleted successfully!'
       ]);
     }else{
       return response()->json([
         'falid ' => 'Record deleted falid!'
     ]);
   }
   
    }

    public function actionEditImageMain($id){
      $id_device = image::select('id_Devices')->where('id' , $id)->get(); 
      $updateAllZero = image::where('id_Devices' , $id_device)->update(['is_main' => 0 ]); 
        $main_image_updated = image::where('id' , $id)->update(['is_main' => 1 ]); 

           if($main_image_updated){
            return response()->json([
                'success' => 'Record updated successfully!'
            ]);
          }else{
            return response()->json([
              'falid ' => 'Record updated falid!'
          ]);
          }
   
     }
    


   public function formAddImage(){
    return view('devices.AddImageDevice');
   }
   public function addImageForDevice(Request $request){
    $id_Device = $request['id_device']; 
    $images    = $request->file('image');
     foreach ($images as $imagefile) {
      $image = new image();
      $path = 'uploads/images/';
      $name_image = time()+rand(1,10000000).'.'.$imagefile->getClientOriginalExtension();
      Storage::disk('local')->put($path.$name_image, file_get_contents( $imagefile ));
      
      $image->image_url = $name_image;
      $image->id_Devices = $id_Device;
       $status=$image->save();
    }
      return  redirect()->back()->with(['status'=>$status]) ; 

 
 
   }
   

}
