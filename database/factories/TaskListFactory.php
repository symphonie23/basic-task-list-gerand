<?php

namespace Database\Factories;

use App\Models\TaskList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskList>
 */
class TaskListFactory extends Factory
{
    protected $model = TaskList::class;

    public function definition(): array
    {
        return [
            'name' =>$this->faker->sentence(3),
        ];
    }
}
