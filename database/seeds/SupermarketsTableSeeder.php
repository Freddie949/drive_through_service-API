<?php

use App\Supermarket;
use Illuminate\Database\Seeder;

class SupermarketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supermarket::create([
            'S_Name' => 'Pick n Pay',
            '_SLocation' => 'Campus Square',
            'S_Status' => 'Closed'
        ]);

        Supermarket::create([
            'S_Name' => 'Spar',
            '_SLocation' => 'Campus Square',
            'S_Status' => 'Closed'
        ]);

        Supermarket::create([
            'S_Name' => 'Shoprite',
            '_SLocation' => 'Campus Square',
            'S_Status' => 'Closed'
        ]);

        Supermarket::create([
            'S_Name' => 'Boxer',
            '_SLocation' => 'Capus Square',
            'S_Status' => 'Closed'
        ]);
    }
}
