<?php

namespace Database\Factories;

use App\Models\Laboratory;
use App\Models\Speciality;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaboratoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Laboratory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->sentence(4),
            "address" => $this->faker->streetAddress(),
            "city" => $this->faker->city(),
            "zip" => rand(10000, 58999),
            "country" => "DZ",
            "state" => "pending",
            "metas" => [],
            "user_id" => User::factory(),
            "speciality_id" => Speciality::factory(),
        ];
    }
}
