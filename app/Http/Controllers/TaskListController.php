<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskList;

class TaskListController extends Controller
{
    public function index()
    {
        $tasklists = TaskList::all();

        return view('tasklists.index', compact('tasklists'));
    }

    public function create()
    {
        $tasklists = TaskList::all();

        return view('tasklists.create', compact('tasklists'));
    }

    public function store(Request $request)
    {
        $tasklist = new TaskList([
            'name' => $request->name,
        ]);
        $tasklist->save();

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

    public function update(Request $request, TaskList $tasklist)
    {
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
