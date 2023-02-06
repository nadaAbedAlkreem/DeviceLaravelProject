<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User ; 

class TrafficUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         $ipaddress = $request->ip() ; 
        $row = User::where('IpAddress' , $ipaddress)->first() ; 
        if($row){
         $row->visits++  ; 
          $row->update() ; 

        }else{
            $traffic_now = new User() ; 
            $traffic_now->IpAddress = $ipaddress ; 
            $traffic_now->TypeUser = "visitor" ; 
            $traffic_now->save() ; 
         }


        return $next($request);
    }
}
