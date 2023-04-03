<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class SetTaskListOwner
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $data = $request->all();
            if (isset($data['created_by'])) {
                $user_id = $data['created_by'];
            } else {
                $user_id = $user->id;
            }
            $data['created_by'] = $user_id;
            $request->merge($data);
        }
        return $next($request);
    }
}











