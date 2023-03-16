<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Biography',
            'Business',
            'Children\'s',
            'Classics',
            'Cookbooks',
            'Crime',
            'Fantasy',
            'Fiction',
            'Graphic Novels',
            'Health',
            'Historical Fiction',
            'History',
            'Horror',
            'Humor',
            'Manga',
            'Memoir',
            'Mystery',
            'Poetry',
            'Religion/Spirituality',
            'Romance',
            'Science',
            'Science Fiction',
            'Self-Help',
            'Sports',
            'Thriller',
            'Travel',
            'Young Adult'
        ];
        foreach ($genres as $gnere) {
            Genre::create([
                'name' => $gnere
            ]);
        }
    }
}
