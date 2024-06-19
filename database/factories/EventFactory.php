<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    protected string $event = Event::class;
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startedAt = $this->faker->dateTimeBetween('-1 year');
        $finishedAt = (clone $startedAt)->modify('+' . $this->faker->numberBetween(5, 10).' hours');
        $createdAt = clone $startedAt;
        $finishedOrNull = $this->faker->boolean(chanceOfGettingTrue: 80);

        return [
            'project_id' => $this->faker->numberBetween(1, 20),
            'items' => $this->faker->numberBetween(1, 1000),
            'duration' => $this->faker->numberBetween(1, 1000),
            'started_at' => $startedAt,
            'created_at' => $createdAt,
            'finished_at' => $finishedOrNull ? $finishedAt : null,
            'applied_to_all_items' => $this->faker->boolean(),
            'user_id' => $this->faker->numberBetween(1,10),
            'rules' => $this->faker->text(),
            'updated_at' => null,
        ];
    }
}
