<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class PropertyStatus
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
        $id = $request->id;


        $property = Property::where('id', $id)->first();


        if ($property->status == 1) {
            return $next($request);
        } elseif (Auth::check() && $property->status == 0) {
            return $next($request);
        } else {
            abort(404);
        }


        //     if (!Auth::check() && $p->status==0) {
        //         abort(403);
        //     }
        //      else{
        //         return $next($request);
        //      }




    }
}
