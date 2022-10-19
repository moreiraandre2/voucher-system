<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $array = array();

        for($i = 1; $i <= 10; $i++) {
             array_push($array,
                [
                    'title' => $faker->name,
                    'subtitle' => $faker->paragraph,
                    'discount' => $faker->month . '%',
                    'often_used' => $faker->year,
                ]
            );
        }

        DB::table('vouchers')->insert($array);
    }
}
