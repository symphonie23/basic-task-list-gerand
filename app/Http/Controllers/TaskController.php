<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use App\Models\Task;
use App\Models\TaskList;
use Carbon\Carbon;
use Illuminate\View\View;
 
class TaskController extends Controller
{
 
    public function index(): View
    {
        $tasks = Task::orderByRaw('CASE WHEN deadline_at IS NULL THEN 1 ELSE 0 END')
            ->orderBy('deadline_at', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();
        return view('tasks.index')->with('tasks', $tasks);
    }    
    
    public function create()
    {
        $task_lists = TaskList::all();
        return view('tasks.create', compact('task_lists'));
    }
  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Task::create($input);
        return redirect('tasklists')->with('flash_message', 'Task Added!');
    }
 
    public function show(string $id): RedirectResponse|View
    {
        $task = Task::find($id);
    
        if (!$task) {
            return redirect('/tasks/error');
        }
    
        $tasks = Task::where('task_list_id', $task->tasklist_id)
                    ->orderBy('deadline_at', 'asc')
                    ->get()
                    ->map(function ($task) {
                        $task->formatted_deadline = $task->deadline_at ? Carbon::parse($task->deadline_at)->format('m-d-Y') : '';
                        return $task;
                    });
        return view('tasks.show')->with('tasks', $task);
    }
    
    
 
    public function edit(string $id): View
    {
        $task = Task::find($id);
        $tasklists = TaskList::all();
        return view('tasks.edit', ['task_lists' => $tasklists])->with('tasks', $task);
    }
    public function update(Request $request, string $id): RedirectResponse
    {
        $task = Task::find($id);
        
        if (!$task) {
            return redirect('tasklists')->with('flash_message', 'Task not found!');
        }
        
        $input = $request->all();
       
        if ($request->has('done')) {
            $input['finished_at'] = now();
        } else {
            $input['finished_at'] = null;
        }
        
        if (!$task->update($input)) {
            return redirect('tasklists')->with('flash_message', 'Task update failed!');
        }
        
        return redirect('tasklists')->with('flash_message', 'Task updated!');
    }
 
    
    public function destroy(string $id): RedirectResponse
    {
        Task::destroy($id);
        return redirect('tasklists')->with('flash_message', 'Task Deleted!');
    }  
}