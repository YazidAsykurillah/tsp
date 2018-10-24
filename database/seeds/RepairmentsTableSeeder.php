<?php

use Illuminate\Database\Seeder;

class RepairmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('repairments')->delete();
    }
}
