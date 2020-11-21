<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Freddie',
            'surname' => 'Mokwena',
            'email' => 'feddiemokwena@gmail.com',
            'phonenumber' => '0762155302',
            'address' => '35 Twicken',
            'password' => '$2y$10$URvlGh/LF0NI3Q6XA7J1J.dljCtj/N4/K2aqN1dvCJq2hMBu4hm9e'
        ]);

        User::create([
            'name' => 'Molebogeng',
            'surname' => 'Rakoma',
            'email' => 'molebogengrakoma@gmail.com',
            'phonenumber' => '0762155301',
            'address' => '35 Twicken',
            'password' => '$2y$10$URvlGh/LF0NI3Q6XA7J1J.dljCtj/N4/K2aqN1dvCJq2hMBu4hm9e'
        ]);

        User::create([
            'name' => 'Freddie',
            'surname' => 'Mokwena',
            'email' => 'feddie@gmail.com',
            'phonenumber' => '0762155300',
            'address' => '35 Twicken',
            'password' => '$2y$10$URvlGh/LF0NI3Q6XA7J1J.dljCtj/N4/K2aqN1dvCJq2hMBu4hm9e'
        ]);

        User::create([
            'name' => 'Marumo',
            'surname' => 'Mokwena',
            'email' => 'marumomokwena@gmail.com',
            'phonenumber' => '0762155315',
            'address' => '35 Twicken',
            'password' => '$2y$10$URvlGh/LF0NI3Q6XA7J1J.dljCtj/N4/K2aqN1dvCJq2hMBu4hm9e'
        ]);
    }
}
