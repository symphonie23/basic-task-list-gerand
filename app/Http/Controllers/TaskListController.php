<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function index()
    {
        $tasklists = TaskList::where('created_by', auth()->user()->id)->paginate(5);
        $counts = [];
        foreach ($tasklists as $tasklist) {
            $totalTasks = $tasklist->tasks()->count();
            $completedTasks = $tasklist->tasks()->whereNotNull('finished_at')->count();
            $counts[$tasklist->id] = [
                'total' => $totalTasks,
                'completed' => $completedTasks,
            ];
        }
        return view('tasklists.index', compact('tasklists', 'counts'));
    }
    
    public function create()
    {
        $tasklists = TaskList::all();

        return view('tasklists.create', compact('tasklists'));
    }

    public function store(Request $request)
    {
       $taskList = new TaskList();
        $taskList->name = $request->input('name');
        $taskList->created_by = $request->input('created_by');
        $taskList->deleted_by = $request->input('deleted_by');
        $taskList->save();

        return redirect()->route('tasklists.index');
    }

    public function show(TaskList $tasklist)
    {
        $tasks = $tasklist->tasks;
        return view('tasklists.show', ['tasklist' => $tasklist, 'tasks' => $tasks]);
    }


    public function edit(TaskList $tasklist)
    {
        return view('tasklists.edit', compact('tasklist'));
    }
    public function hello(Request $request, TaskList $tasklist)
    {
        dd($request);
        die;
    }

    public function update(Request $request, TaskList $tasklist)
    {
        dd($request);
        die;
        $tasklist->update([
            'name' => $request->name,
        ]);

        return redirect()->route('tasklists.index');
    }

    public function destroy(TaskList $tasklist)
    {
        $tasklist->delete();

        return redirect()->route('tasklists.index');
    }
}