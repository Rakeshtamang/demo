<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) { // Adjust the number of records as needed
            $customer = new Customer();
            $customer->name = $faker->name;
            $customer->email = $faker->unique()->safeEmail; // Ensuring unique email
            $customer->address = $faker->address;
            $customer->state = $faker->state;
            $customer->country = $faker->country;
            $customer->dob = $faker->date;
            $customer->password = Hash::make('password'); // Use a hashed password
            $customer->status = $faker->boolean ? 1 : 0; // Use 1 for active, 0 for inactive
            $customer->points = $faker->numberBetween(1, 100);
            $customer->save();
        }

        // Reset unique state for faker to prevent conflicts in other seeders
        $faker->unique(true);
    }
}
