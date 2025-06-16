<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    public function run()
    {
        // Clear the jobs table first to avoid duplicates
        DB::table('jobs')->truncate();

        DB::table('jobs')->insert([
            [
                'title' => 'Social Media Assistant',
                'company' => 'Nomad',
                'location' => 'Phnom Penh',
                'employment_type' => 'Full-Time',
                'category' => 'Marketing',
                'level' => 'Entry Level',
                'applied_count' => 5,
                'capacity' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Software Developer',
                'company' => 'TechCorp',
                'location' => 'Siem Reap',
                'employment_type' => 'Full-Time',
                'category' => 'IT',
                'level' => 'Mid Level',
                'applied_count' => 2,
                'capacity' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Graphic Designer',
                'company' => 'Creative Studio',
                'location' => 'Phnom Penh',
                'employment_type' => 'Part-Time',
                'category' => 'Design',
                'level' => 'Entry Level',
                'applied_count' => 3,
                'capacity' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Customer Service Representative',
                'company' => 'SupportHub',
                'location' => 'Kandal',
                'employment_type' => 'Full-Time',
                'category' => 'Customer Service',
                'level' => 'Entry Level',
                'applied_count' => 4,
                'capacity' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'res somram',
                'company' => 'res somram',
                'location' => 'Kandal',
                'employment_type' => 'Full-Time',
                'category' => 'Customer Service',
                'level' => 'Entry Level',
                'applied_count' => 4,
                'capacity' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
