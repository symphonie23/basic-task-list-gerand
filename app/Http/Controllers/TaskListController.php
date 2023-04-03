<?php

namespace App\Http\Controllers;
use App\Http\Middleware\CheckTaskListOwnership;
use App\Http\Middleware\SetTaskListOwner;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function __construct()
    {
        $this->middleware(SetTaskListOwner::class)->only('store');
        $this->middleware(CheckTaskListOwnership::class)->except(['index', 'create', 'store']);
    }
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
        return view('tasklists.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $validatedData['created_by'] = auth()->id();
        TaskList::create($validatedData);
        return redirect()->route('tasklists.index')->with('success', 'Task List created successfully.');
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
    public function update(Request $request, TaskList $tasklist)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $tasklist->update($validatedData);
        return redirect()->route('tasklists.show', $tasklist)->with('success', 'Task List updated successfully.');
    }
    public function destroy(TaskList $tasklist)
    {
        $tasklist->delete();
        return redirect()->route('tasklists.index')->with('success', 'Task List deleted successfully.');
    }


    public function countFinishedTasks($id)
    {
        $taskList = TaskList::findOrFail($id);
        $count = $taskList->tasks()->whereNotNull('finished_at')->count();
        return view('tasks.index', compact('taskList', 'count'));
    }
}