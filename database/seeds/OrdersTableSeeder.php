<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'Discount' => 10,
            'Total_Amount' => 275.83,
            'Latitude' => -26.183409,
            'Longitude' => 28.00251,
            'Pick_up_point' => 'Auckland Park, Johannesburg, Gauteng, South Africa',
            'user_id' => 1
        ]);

        Order::create([
            'Discount' => 15,
            'Total_Amount' => 275.83,
            'Latitude' => -26.183409,
            'Longitude' => 28.00251,
            'Pick_up_point' => 'Auckland Park, Johannesburg, Gauteng, South Africa',
            'user_id' => 2
        ]);

        Order::create([
            'Discount' => 20,
            'Total_Amount' => 275.83,
            'Latitude' => -26.183409,
            'Longitude' => 28.00251,
            'Pick_up_point' => 'Auckland Park, Johannesburg, Gauteng, South Africa',
            'user_id' => 1
        ]);

        Order::create([
            'Discount' => 0,
            'Total_Amount' => 275.83,
            'Latitude' => -26.183409,
            'Longitude' => 28.00251,
            'Pick_up_point' => 'Auckland Park, Johannesburg, Gauteng, South Africa',
            'user_id' => 3
        ]);

        Order::create([
            'Discount' => 10,
            'Total_Amount' => 275.83,
            'Latitude' => -26.183409,
            'Longitude' => 28.00251,
            'Pick_up_point' => 'Auckland Park, Johannesburg, Gauteng, South Africa',
            'user_id' => 1
        ]);

        Order::create([
            'Discount' => 10,
            'Total_Amount' => 275.83,
            'Latitude' => -26.183409,
            'Longitude' => 28.00251,
            'Pick_up_point' => 'Auckland Park, Johannesburg, Gauteng, South Africa',
            'user_id' => 1
        ]);

        Order::create([
            'Discount' => 10,
            'Total_Amount' => 275.83,
            'Latitude' => -26.183409,
            'Longitude' => 28.00251,
            'Pick_up_point' => 'Auckland Park, Johannesburg, Gauteng, South Africa',
            'user_id' => 1
        ]);
    }
}
