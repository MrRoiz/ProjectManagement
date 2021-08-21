<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\UserStory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

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
            'user_story_id'  => UserStory::all()->random()->id
        ];
    }
}
