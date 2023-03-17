<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Collection;
use App\Models\Genre;
use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $NUMAUTHORS = 20;
        $statusIds = Status::pluck('id')->toArray();
        $genreIds = Genre::pluck('id')->toArray();
        $collectionIds = Collection::pluck('id')->toArray();

        $authors = Author::factory($NUMAUTHORS)->create();
        $authors->each(function ($author) use ($statusIds, $genreIds, $collectionIds) {
            $numBooks = rand(1, 10);
            $statusId = $statusIds[array_rand($statusIds)];
            $genreId = $genreIds[array_rand($genreIds)];
            $collectionId = $collectionIds[array_rand($collectionIds)];

            Book::factory($numBooks)
                ->create([
                    'author_id' => $author->id,
                    'status_id' => $statusId,
                    'genre_id' => $genreId,
                    'collection_id' => $collectionId
                ]);
        });
    }
}
