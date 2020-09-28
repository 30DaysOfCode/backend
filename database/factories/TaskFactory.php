<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tracks = array('FRONTEND', 'BACKEND', 'ML', 'MOBILE');

        return [
            'community_id' => rand(0, 10),
            'task_day' => rand(1, 30),
            'track' => $tracks[rand(0, 3)],
            'level' => rand(1, 3),
            'task' => $this->faker->text($maxNbChars = 300)
        ];
    }
}
