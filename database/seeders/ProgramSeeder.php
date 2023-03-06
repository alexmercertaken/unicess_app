<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::create(['program' => 'Physical Fitness & Sport Development' ]);
        Program::create(['program' => 'Information Communication & Education' ]);
        Program::create(['program' => 'Literacy, Numeracy & Languange Enhancement' ]);
        Program::create(['program' => 'Cultural Development' ]);
        Program::create(['program' => 'Livelihood Technical & Business Management' ]);
        Program::create(['program' => 'Environmental Conversation & Disaster Preparedness' ]);
        Program::create(['program' => 'Management & Leardership Development' ]);
        Program::create(['program' => 'Especial Institute & Teaching Training Program' ]);
    }
}
