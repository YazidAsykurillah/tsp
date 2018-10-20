<?php

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
        \DB::table('items')->delete();
        $data = [
        	['id'=>1, 'code'=>'ITEM001', 'name'=>'Laptop 1', 'description'=>'Lorem ipsum dolor sit amet, ipsum lorem dolor'],
        	['id'=>2, 'code'=>'ITEM002', 'name'=>'Laptop 2', 'description'=>'Lorem ipsum dolor sit amet, ipsum lorem dolor'],
        	['id'=>3, 'code'=>'ITEM003', 'name'=>'Monitor 1', 'description'=>'Lorem ipsum dolor sit amet, ipsum lorem dolor'],
        	['id'=>4, 'code'=>'ITEM004', 'name'=>'Monitor 2', 'description'=>'Lorem ipsum dolor sit amet, ipsum lorem dolor'],
        ];

        \DB::table('items')->insert($data);
    }
}
