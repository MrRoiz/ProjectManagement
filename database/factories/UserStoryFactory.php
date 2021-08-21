<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\UserStory;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserStoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserStory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->text(10),
            'description' => $this->faker->text(25),
            'project_id'  => Project::all()->random()->id
        ];
    }
}
