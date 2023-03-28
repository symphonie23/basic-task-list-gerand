<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\TaskList;
use App\Models\Task;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void 
    {
        \App\Models\TaskList::factory(20)->create()->each(function ($taskList) {
            $taskList->tasks()->saveMany(\App\Models\Task::factory(4)->create(['task_list_id' => $taskList->id]));
        });
    
    }
}
