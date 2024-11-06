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
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 50; $i++) {
            Employee::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->regexify('\+62[0-9]{10,11}'),
                'address' => $faker->address,
                'hire_date' => $faker->date($format = 'Y-m-d', $max = 'now', $min = '10 years ago'),
                'position_id' => $faker->numberBetween(1, 4),
                'salary' => $faker->randomFloat(2, 3, 8) * 1000000,
                'status' => $faker->randomElement(['active', 'inactive']),
                'photo' => null,
            ]);
        }
    }
}
