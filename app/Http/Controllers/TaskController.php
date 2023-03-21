<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return redirect('/');
    }
        /**
     * Show a specific task and its associated task list.
     */
    public function showTask($taskId)
    {
        $task = Task::find($taskId);
        $taskList = $task->taskList;
        return view('task.show', [
            'task' => $task,
            'taskList' => $taskList,
        ]);
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}