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
        $size = ['3.0 mb', '400 mb', '10.5 mb', '1.3 kb'];
        $random_extension = $extension[random_int(0, 3)];
        return [
            'extension' =>  $random_extension,
            'name' => $this->faker->name(). '.' . $random_extension,
            'size' => $size[random_int(0, 3)],
            'relative_time' => $this->faker->date(),
        ];
    }
}
