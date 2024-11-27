<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;
use App\Models\User;
use App\Models\Priority;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(20),
            'description' => fake()->text(50),
            'category_id' => Category::inRandomOrder()->value('id'),
            'priority_id' => Priority::inRandomOrder()->value('id'),
            'submitted_by' => User::inRandomOrder()->value('id'),
            'assigned_to' => User::inRandomOrder()->value('id'),
        ];
    }
}
