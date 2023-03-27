<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('total_tasks')->nullable();
            $table->integer('finished_tasks')->nullable();
            $table->timestamps();
        });
        
        // Calculate and update total and finished tasks for each task list
        $taskLists = \App\Models\TaskList::all();
        foreach ($taskLists as $taskList) {
            $totalTasks = $taskList->tasks->count();
            $finishedTasks = $taskList->tasks()->where('finished', true)->count();
            $taskList->update([
                'total_tasks' => $totalTasks,
                'finished_tasks' => $finishedTasks,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_lists');
        Schema::table('task_lists', function (Blueprint $table) {
            $table->dropColumn(['total_tasks', 'finished_tasks']);
        });
    }
};
