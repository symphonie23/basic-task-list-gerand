<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class CheckDeletedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
        {
            $user = Auth::user();
          
        if ($user !== null && $request->isMethod('DELETE')) {
            $data = $request->all();
            // dd( $data); 
            // dd($request->isMethod('DELETE'));

            if (!isset($data['deleted_by'])) {
                $data['deleted_by'] = $user->id;
            }
         
            $request->merge($data);
       
        }

        return $next($request);
    }
}

    