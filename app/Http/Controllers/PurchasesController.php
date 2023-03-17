<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Device ;
use App\Models\Category ; 
use App\Models\Purchases ;

use Illuminate\Support\Str;
use App\Models\image ; 
use DataTables;
use App\Http\Requests\DevicesRequest ; 
use Illuminate\Support\Facades\Storage;
 use Illuminate\Support\Facades\Redirect;
use App  ; 


class PurchasesController extends Controller
{
  
   public function viewPurchases(Request $request){
    $data = Purchases::select('*')->get();
 
      
    if ($request->ajax()) {
      
      $data = Purchases::with("product");
      
  
      return Datatables::of($data)
      
              ->addIndexColumn()

            //   ->filter(function ($instance) use ($request) {
            //  if (!empty($request->get('category')) && $request->get('category') <> -1 ) {
            //       $instance->where('category_id', $request->get('category'));
            //   }
            //   if (!empty($request->get('search')) ) { 
            //     $search =$request->get('search');
            //     $instance->where('name','like' , "%$search%");
            // }
            //   })
            
                
         
              ->make(true);
            }
  
       
       return  view('purchases.ViewPurchases') ; 
   }



}
