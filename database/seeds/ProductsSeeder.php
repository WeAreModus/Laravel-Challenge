<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // if(DB::table('products')->count() == 0){
            $faker = Faker::create();

            for($i=0; $i<20; $i++):
                DB::table('products')
                    ->insert([
                        'name' => $faker->lastName,
                        'description' => $faker->paragraph(1),
                        'price' => $faker->randomNumber(2),
                        'address' => $faker->streetAddress,
                        'state' => $faker->state,
                        'city' => $faker->city,
                        'zip' => $faker->postcode,
                        'country' => $faker->country,
                        'photo'=> $faker->imageUrl($width = 640, $height = 480),
                    ]);
            endfor;
        // } else {
        //     throw new \Exception('Products table is not empty');
        // }
    }
}
