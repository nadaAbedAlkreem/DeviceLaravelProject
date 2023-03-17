<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device ;
use App\Models\Category ; 
use App\Models\ratings ; 
use Illuminate\Support\Str;
use App\Models\image ; 
use DataTables;
use App\Http\Requests\DevicesRequest ; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App  ; 
use Auth ; 
use DB;

use App\Models\User ; 

class IndexController extends Controller
{
    public function index(){
        $category  = Category::where("level" , "==" , "0")->get() ; 
          $device = Device::with('image')->with('category')->get() ;
          return  view('web.index' , [ 'infoProduct'=> $device  , 'imageCategory' => $category ]) ; 
    }


    public function viewAllProductByCategory(Request $request, $id)
    {    
        $data = Device::with('image')->where('category_id' , $id)->Paginate(4);
         if ($request->ajax()) {
             return  view('web.content-show-product'  ,compact( 'data' ) )->render() ;

        }
        return  view('web.show-product'  ,compact( 'data' ) )->render() ;
      
}



//     function fetchDataProductAjax(Request $request)
//         {
//         if($request->ajax())
//         {
//             $data = Device::with('image')->where('category_id' , $request['id'])->paginate(2);
//             return  view('web.ShowProduct'  ,compact( 'data' ) )->render() ;
//         }
// }


    public function details(Request $request){
         $device = Device::with('image')->with('category')->where('id' , $request['id'])->get() ;
            return  view('web.details' , [ 'infoProduct'=> $device ]) ;
    }

    public function actionAddRating(Request $request){ 
     if(\Request::ajax()){
            $rating = new ratings() ; 
               $rating->emailCustomer = $request->get('email') ; 
               $rating->rate =$request->get('rating'); 
               $rating->comment =$request->get('comment'); 
               $rating->id_device  =$request->get('id_device'); 
               $result = $rating->save()  ;
    
     //    if(empty(Auth::user()->TypeUser ) || (!empty(Auth::user()->TypeUser )) == "admin" ){ 
     //          $response =   true;  // false 
     //          $device = Device::find($id);
     //          if(!$device instanceof Device){
     //           return redirect()->back();
     //         }
    
             return response()->json(['response'=>  $result   ]) ; 

     }
}
}
