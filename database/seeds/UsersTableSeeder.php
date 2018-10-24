<?php

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
        \DB::table('users')->delete();
        $users = [
        	['id'=>1, 'name'=>'Yazid Asykurillah', 'email'=>'asykurillah@email.com', 'password'=>bcrypt('password')],
            ['id'=>2, 'name'=>'Jose Mourinho', 'email'=>'mourinho@email.com', 'password'=>bcrypt('password')],
            ['id'=>3, 'name'=>'Paul Scholes', 'email'=>'scholes@email.com', 'password'=>bcrypt('password')],
            ['id'=>4, 'name'=>'Ryan Gigs', 'email'=>'gigs@email.com', 'password'=>bcrypt('password')],
            ['id'=>5, 'name'=>'Anthony Martials', 'email'=>'martials@email.com', 'password'=>bcrypt('password')],
            ['id'=>6, 'name'=>'Jesse Lingard', 'email'=>'lingard@email.com', 'password'=>bcrypt('password')],
            ['id'=>7, 'name'=>'Steven Gerrard', 'email'=>'gerrard@email.com', 'password'=>bcrypt('password')],
        	['id'=>8, 'name'=>'Frank Lampard', 'email'=>'lampard@email.com', 'password'=>bcrypt('password')],
        ];

        \DB::table('users')->insert($users);
    }
}
