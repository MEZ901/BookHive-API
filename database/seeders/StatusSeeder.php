<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            "Available",      // The book is currently available for borrowing.
            "Checked out",    // The book has been borrowed by a patron and is not currently available.
            "On hold",        // A patron has requested the book and it is being held for them.
            "In processing",  // The book is being processed, such as being cataloged or repaired.
            "Missing",        // The book is missing and cannot be found.
            "Lost"            // The book has been declared lost and the patron who checked it out is responsible for its replacement.
        ];

        foreach($statuses as $status) {
            Status::create([
                'name' => $status
            ]);
        }
    }
}
