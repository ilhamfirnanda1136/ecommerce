<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use Illuminate\Support\Str;

use DB,Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 120; $i++){
            DB::table('customer')->insert([
                'uuid' => Str::uuid(),
                'email'=> $faker->email,
                'nama' => $faker->name,
                'username' => $faker->username,
                'alamat'=>$faker->address,
                'password'=>Hash::make('damarwulan'),
                'gender'=>$faker->numberBetween(1,2),
                'provinsi_id'=>$faker->numberBetween(11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30),
                'no_telp'=> $faker->numerify('0##########'),
                'kode_pos'=> $faker->numerify('0##########'),
            ]);
        }
    }
}
