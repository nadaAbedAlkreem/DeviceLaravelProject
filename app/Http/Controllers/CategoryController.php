<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category ; 
use App\Http\Requests\CategoryRequest ; 
use DataTables;


class CategoryController extends Controller
{
   public function view(Request $request){
    $data_view = Category::select('*')->get();
    if ($request->ajax()) {
        $data = Category::select('*');
        return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('category')) && $request->get('category') <> -1 ) {
                        $instance->where('level', $request->get('category'));
                    }
                    if (!empty($request->get('search')) ) { 
                      $search =$request->get('search');
                      $instance->where('name','like' , "%$search%");
                  }
                })
                ->addColumn('action', function ($data) {
                  return '<a href="form/EditView/'.$data->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <meta name="csrf-token" content="{{ csrf_token() }}">
    
                  <button class="deleteRecord btn btn-xs btn-danger show_confirm"    data-id="'.$data->id.'" >Delete </button>
                   
                  ';
                })
                 ->make(true);
    }
   
     return  view('categories.viewCategory' , ['data' =>$data_view]) ; 
   }

   public function formCategory()
   { 
     $supCategory = Category::where('level' ,'0')->get() ; 
    return view('categories.addCategory' , ['categoryViewForm'=>$supCategory]) ;
     
    
   }
   
   public function formEditCategory(Request $request )
   { 
    $id = $request['id'] ; 
     $supCategory = Category::where('level' ,'0')->get() ; 
     $Row_Edit = Category::where('id' ,$id)->get() ; 

    return view('categories.EditCategory' , ['categoryViewForm'=>$supCategory , 'row'=> $Row_Edit ]) ;
     
   }

   public function actionEditCategory(CategoryRequest $request )
   {
    $id = $request['id'] ; 
    $image = $request['image'] ; 
    $category = Category::find($id);
     if(!empty($request['name'])){
      $category->name = $request['name'];

     }
    

    if(!empty($image)){
      $path = 'uploads/images/';
      $name_image = time()+rand(1,10000000).'.'.  $image->getClientOriginalExtension(); 
      Storage::disk('local')->put($path.$name_image, file_get_contents( $image ));
      $category->image = $name_image;
      }
  
      if(!$category instanceof Category){
          return redirect()->back();
      }
      
      if ($request['level'] != -1){
         $category->level =  $request['level'] ;
        
        
      }
      if(!$category->save()){
        return redirect()->back()->with(['status' => false  ]) ;
   }else{

      return redirect()->back()->with(['status' => true ]);  
   }
     
   }

   public function delete($id){
    $result = Category::find($id)->delete($id);
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

   public function  addActionCategory(CategoryRequest $request){
          $name  = $request['name']  ;
          $image = $request['image'] ; 
          $level = $request['level'] ; 
          $category = new Category() ; 
          $category->name = $name ; 
          $category->level = $level ; 
          if(!empty($image)){
            $path = 'uploads/images/';
            $name_image = time()+rand(1,10000000).'.'.  $image->getClientOriginalExtension(); 
            Storage::disk('local')->put($path.$name_image, file_get_contents( $image ));
            $category->image = $name_image;
          }
           $state = $category->save() ; 
         
    return redirect()->back()->with(['status'=>$state]) ; 
   }

      
}
