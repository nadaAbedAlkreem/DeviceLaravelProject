<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ratings ; 
use DataTables;

class ReviewsController extends Controller
{
     public function  view (Request $request){
    
        if ($request->ajax()) {
         $data = ratings::select('*') ;

          return Datatables::of($data)
                  ->addIndexColumn()
                  ->filter(function ($instance) use ($request) {
                    
                      if (!empty($request->get('search')) ) { 
                        $search =$request->get('search');
                        $instance->where('name','like' , "%$search%");
                    }
                  })
                   
                   ->make(true);
      }
     
        return view('Reviews') ; 
     }
}
