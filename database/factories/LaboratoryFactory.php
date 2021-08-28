<?php

namespace Database\Factories;

use App\Models\Laboratory;
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
            "first_name" => $this->faker->firstName("male"),
            "last_name" => $this->faker->lastName(),
            "gender" => $this->faker->randomElement(["male", "female"]),
            "birthdate" => Carbon::today()->subYears(18)->subDays(rand(1,100))->format("Y-m-d"),
            "birth_place" => $this->faker->city(),
            "address" => $this->faker->streetAddress(),
            "city" => $this->faker->city(),
            "zip" => rand(10000, 58999),
            "country" => "DZ",
            "state" => "pending",
            "metas" => [
                "days_off" => [Carbon::getWeekendDays()]
            ],
            "user_id" => User::factory(),
        ];
    }
}
