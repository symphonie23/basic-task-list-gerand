<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TaskList;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'name' =>$this->faker->sentence(4),
            'desc' =>$this->faker->paragraph(2),
            'deadline_at' =>$this->faker->dateTimeBetween('now', '+1 month'),
            'task_list_id' =>TaskList::factory(),
        ];
    }
}
