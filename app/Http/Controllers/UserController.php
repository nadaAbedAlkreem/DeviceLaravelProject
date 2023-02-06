<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User ; 
use DataTables;

class UserController extends Controller
{
    

public function view (Request $request){
 
    if ($request->ajax()) {
        $data = User::select('*')->where('TypeUser' , '<>' , 'admin');
        return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search')) ) { 
                      $search =$request->get('search');
                      $instance->where('name','like' , "%$search%")
                       ->orWhere('TypeUser' , 'like' , "%$search%") ; 
                  }
                })
                ->addColumn('action', function ($data) {
                  return '<a href="form/EditView/'.$data->id.'" class="btn btn-xs btn-primary">
                  <i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <meta name="csrf-token" content="{{ csrf_token() }}">
                  <button class="deleteRecord btn btn-xs btn-danger show_confirm"    data-id="'.$data->id.'" >Delete </button>';
                })
                
 
                 ->make(true);
              }


 return view ('Users.user') ; 

}

public function delete($id){
   $result = User::find($id)->delete($id);

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


}
