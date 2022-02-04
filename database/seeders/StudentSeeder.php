<?php

namespace Database\Seeders;

use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker=Faker::create();
        // foreach (range(1,10) as $value) {
        //     $students=new Students();
        //     $students->name=$faker->name();
        //     $students->city=$faker->city();
        //     $students->fees=$faker->randomFloat(3);
        //     $students->save();

        // }
        //
        $faker=Faker::create();
        foreach(range(1,10) as $value){
            DB::table('students')->insert([
                'name'=>$faker->name(),
                'city'=>$faker->city(),
                'fees'=>$faker->randomFloat(),
            ]);
        }
    }
}
