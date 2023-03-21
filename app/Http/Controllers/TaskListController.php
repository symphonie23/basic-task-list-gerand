<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function index()
    {
        $tasklists = TaskList::all();
        return view('tasklists.index', compact('tasklists'));
    }

    public function create()
    {
        return view('tasklists.create');
    }

    public function store(Request $request)
    {
        $tasklist = TaskList::create($request->all());
        return redirect()->route('tasklists.show', $tasklist->id);
    }

    public function show(TaskList $tasklist)
    {
        $tasks = $tasklist->task;
        return view('tasklists.show', compact('tasklist', 'tasks'));
    }

    public function edit(TaskList $tasklist)
    {
        return view('tasklists.edit', compact('tasklist'));
    }

    public function update(Request $request, TaskList $tasklist)
    {
        $tasklist->update($request->all());
        return redirect()->route('tasklists.show', $tasklist->id);
    }

    public function destroy(TaskList $tasklist)
    {
        $tasklist->delete();
        return redirect()->route('tasklists.index');
    }
}
