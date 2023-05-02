<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\TaskList;
use App\Models\Task;
use App\Models\User;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void 
    {
        // Create 10 Users
        User::factory(10)->create()->each(function ($user) {
            // For each User, create 20 TaskLists and associate them with 4 Tasks each
            TaskList::factory(20)->create()->each(function ($taskList) {
                $taskList->tasks()->saveMany(Task::factory(4)->create(['task_list_id' => $taskList->id]));
            });
        });
    }
}




