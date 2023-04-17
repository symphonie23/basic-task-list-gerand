<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckDeletedUser
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user !== null && $request->method() == 'DELETE') {
            $data = $request->all();

            $data['deleted_by'] = $user->id;
            
            $request->merge($data);
    }

    return $next($request);
    }
}
