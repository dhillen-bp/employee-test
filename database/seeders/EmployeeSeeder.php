<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Employee::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'hire_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'position_id' => $faker->numberBetween(1, 4),
                'salary' => $faker->randomFloat(2, 3, 8) * 1000000,
                'status' => $faker->randomElement(['active', 'inactive']),
                'photo' => null,
            ]);
        }
    }
}
