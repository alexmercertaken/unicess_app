<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Faculty::create(['name' => 'English Faculty' ]);
        Faculty::create(['name' => 'Filipino Faculty' ]);
        Faculty::create(['name' => 'Math Faculty' ]);
        Faculty::create(['name' => 'Science Faculty' ]);
        Faculty::create(['name' => 'IT Faculty' ]);
        Faculty::create(['name' => 'History Faculty' ]);
    }
}
