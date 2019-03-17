<?php

use Illuminate\Database\Seeder;

use App\Students;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

//        Students::truncate();

        // Initialize the Faker package. We can use several different locales for it, so
        // let's use the german locale to play with it.
        $faker = \Faker\Factory::create('de_DE');

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Students::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'registration_number' => $faker->numberBetween(0, 99999),
                'starting_course' => ( $faker->numberBetween(0, 1) == 0 ) ?  'MPP' : 'FPP'
            ]);
        }
    }
}
