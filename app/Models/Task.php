<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name','desc','finished','task_list_id'];
    
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($task) {
            $taskList = $task->taskList;
            $totalTasks = $taskList->tasks()->count();
            $finishedTasks = $taskList->tasks()->where('finished', true)->count();
            $taskList->total_tasks = $totalTasks;
            $taskList->finished_tasks = $finishedTasks;
            $taskList->save();
        });
    }

    public function taskList()
    {
        return $this->belongsTo(TaskList::class);
    }
}