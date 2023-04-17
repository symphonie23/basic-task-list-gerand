<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class SetTaskListOwner
{
    public function handle($request, Closure $next)
    {
            $user = Auth::user();

        if ($user !== null) {
            $data = $request->all();

            if (!isset($data['created_by'])) {
                $data['created_by'] = $user->id;
            }
            
            $request->merge($data);
        }

        return $next($request);
    }
}

