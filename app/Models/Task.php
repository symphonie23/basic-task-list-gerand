<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
                    'name', 
                    'desc',
                    'task_list_id',
                    'finished_at'
                ];

    public function taskList()
    {
        return $this->belongsTo(TaskList::class);
    }
}