<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Project');

        for($i = 1; $i <= 10; $i ++){

            DB::table('projects')->insert([
                'project_name' => $faker->sentence(),
                'description' => $faker->sentence(),
                'date_of_creation' => \Carbon\Carbon::now(),
                'author' => $faker->name(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
            ]);
        }

    }
}
