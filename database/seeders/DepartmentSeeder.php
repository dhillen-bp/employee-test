<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Human Resources', 'description' => 'Handles recruitment and employee relations'],
            ['name' => 'IT', 'description' => 'Handles all tech-related tasks'],
            ['name' => 'Marketing', 'description' => 'Focuses on promoting the company and its products'],
            ['name' => 'Finance', 'description' => 'Manages company finances and budgeting'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
