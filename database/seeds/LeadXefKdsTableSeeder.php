<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class LeadXefKdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_xef_kds')->truncate();
        DB::table('lead_xef_kds')->insert([
            ['name' => 'Sí','order' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'No','order' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
