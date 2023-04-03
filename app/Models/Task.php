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
                    'finished_at',
                    'deadline_at',
                    'created_by'
                ];
    protected $casts = [
                    'deadline_at' => 'datetime',
                ];
                
    public function taskList()
    {
        return $this->belongsTo(TaskList::class);
    }
   
}