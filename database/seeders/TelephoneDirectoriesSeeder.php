<?php

namespace Database\Seeders;

use App\Models\Telephonedirectory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class TelephoneDirectoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Telephonedirectory::create([
                'photo'          => $faker->imageUrl(200, 200, 'people', true, 'profile'),
                'first_name'     => $faker->firstName,
                'middle_name'    => $faker->randomElement([null, $faker->firstName]),
                'last_name'      => $faker->lastName,
                'email'          => $faker->unique()->safeEmail,
                'mobile_number'  => $faker->phoneNumber,
                'landline_number'=> $faker->randomElement([null, $faker->phoneNumber]),
                'notes'          => $faker->sentence(10),
            ]);
        }
    }
}
