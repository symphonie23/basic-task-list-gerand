<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TaskList;
class CheckTaskListOwnership
{
    public function handle(Request $request, Closure $next)
    {
        $tasklist_id = $request->route('tasklist')->id;
        $user_id = Auth::id();
        $tasklist = TaskList::where('id', $tasklist_id)->where('created_by', $user_id)->first();
        if (!$tasklist) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}










