<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            ['name' => 'HR Manager', 'department_id' => 1, 'description' => 'Oversees the HR department'],
            ['name' => 'Software Engineer', 'department_id' => 2, 'description' => 'Develops and maintains software applications'],
            ['name' => 'Marketing Specialist', 'department_id' => 3, 'description' => 'Promotes products and manages campaigns'],
            ['name' => 'Accountant', 'department_id' => 4, 'description' => 'Prepares financial statements and manages budgets'],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
