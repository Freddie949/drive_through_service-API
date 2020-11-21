<?php

use App\Item;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'I_Name' => 'Sugar',
            'I_Weight' => '2Kg',
            'I_Price' => 25.00,
            'supermarket_id' => 2
        ]);

        Item::create([
            'I_Name' => 'Bread',
            'I_Weight' => '250g',
            'I_Price' => 14.00,
            'supermarket_id' => 2
        ]);

        Item::create([
            'I_Name' => 'Sugar',
            'I_Weight' => '2Kg',
            'I_Price' => 25.00,
            'supermarket_id' => 1
        ]);

        Item::create([
            'I_Name' => 'Bread',
            'I_Weight' => '250g',
            'I_Price' => 14.00,
            'supermarket_id' => 1
        ]);

        Item::create([
            'I_Name' => 'Milk',
            'I_Weight' => '2L',
            'I_Price' => 20.00,
            'supermarket_id' => 2
        ]);

        Item::create([
            'I_Name' => 'Milk',
            'I_Weight' => '2L',
            'I_Price' => 20.00,
            'supermarket_id' => 1
        ]);

        Item::create([
            'I_Name' => 'Sugar',
            'I_Weight' => '2Kg',
            'I_Price' => 25.00,
            'supermarket_id' => 3
        ]);

        Item::create([
            'I_Name' => 'Bread',
            'I_Weight' => '250g',
            'I_Price' => 14.00,
            'supermarket_id' => 3
        ]);

        Item::create([
            'I_Name' => 'Milk',
            'I_Weight' => '2L',
            'I_Price' => 20.00,
            'supermarket_id' => 3
        ]);
    }
}
