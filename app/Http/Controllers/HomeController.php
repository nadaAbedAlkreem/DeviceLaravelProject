<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting ;

class HomeController extends Controller
{
   public function index(){
  
    return view('dashboard'   ) ; 
   }
   // public  function loginView(){
   //    return view('auth.login') ; 
   //  }

   public function __construct()
   {
       $this->middleware('auth');
   }
}
