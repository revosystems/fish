<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadRetailSaleLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_retail_sale_location')->truncate();
        DB::table('lead_retail_sale_location')->insert([
            ['name' => 'En un local','ordern' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'En mobilidad','ordern' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}