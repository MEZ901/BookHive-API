<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        do {
            $location = fake()->regexify('[A-Z][0-9]');
        } while (Book::where('location', $location)->exists());

        return [
            'isbn' => fake()->isbn13(),
            'title' => fake()->word(),
            'date_publication' => fake()->dateTime(),
            'number_pages' => fake()->randomNumber(4, false),
            'location' => $location,
            'content' => fake()->paragraph(5, true),
        ];
    }
}
