<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SupermarketsTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}
