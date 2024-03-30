<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\files_request>
 */
class files_requestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $extension = ['pdf', 'docx', 'txt', 'xls'];
        $size = ['21350', '21350', '21350', '21350'];
        $rand_department = ['Logistic', 'Finance', 'HR', 'Administrative'];
        $random_extension = $extension[random_int(0, 3)];

        return [
            'extension' =>  $random_extension,
            'name' => $this->faker->name() . '.' . $random_extension,
            'size' => $size[random_int(0, 3)],
            'relative_time' => $this->faker->date(),
            'department' => $rand_department[random_int(0, 3)],
        ];
    }
}
