<?php

namespace Database\Seeders;

use App\Models\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = [
            'Harry Potter Series',
            'Lord of the Rings Trilogy',
            'The Hunger Games Trilogy',
            'A Song of Ice and Fire Series',
            'The Chronicles of Narnia',
            'The Hitchhiker\'s Guide to the Galaxy Series',
            'The Percy Jackson and the Olympians Series',
            'The Twilight Saga',
            'The Divergent Trilogy',
            'The Maze Runner Series',
            'The Dark Tower Series',
            'The Wheel of Time Series',
            'The Discworld Series',
            'The Dresden Files Series',
            'The Stephanie Plum Series',
            'The Outlander Series',
            'The Jack Reacher Series',
            'The Millennium Series',
            'The No. 1 Ladies\' Detective Agency Series',
            'The Southern Vampire Mysteries Series',
            'The Earthsea Cycle Series',
            'The Bartimaeus Trilogy',
            'The Inheritance Cycle Series',
            'The Mistborn Trilogy',
            'The Stormlight Archive Series',
            'The First Law Trilogy',
            'The Kingkiller Chronicle Series',
            'The Gentleman Bastard Series',
            'The Malazan Book of the Fallen Series'
        ];
        foreach ($collections as $collection) {
            Collection::create([
                'name' => $collection
            ]);
        }
    }
}
