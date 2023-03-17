<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting ;
use App\Charts\IncomeChart;
use Auth ; 

class HomeController extends Controller
{
   public function index(IncomeChart $chart){
 
    return view('dashboard' ,['chart' => $chart->build() ]) ; 
   }
 

   public function __construct()
   {
       $this->middleware('auth');
   }
}
