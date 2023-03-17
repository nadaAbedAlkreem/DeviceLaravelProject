<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Favourites ; 
use Illuminate\Support\Str;
use App\Models\image ; 
use DataTables;
use App\Http\Requests\DevicesRequest ; 
use Illuminate\Support\Facades\Storage;
 use Illuminate\Support\Facades\Redirect;
use App  ; 


class FavouritesController extends Controller
{
    
  public function view(Request $request ){

    if ($request->ajax()) {
        $data = Favourites::select('*');
        return Datatables::of($data)
       
                 ->make(true);
    }
    return view('favourites.ViewFavourites') ; 

  }




}
