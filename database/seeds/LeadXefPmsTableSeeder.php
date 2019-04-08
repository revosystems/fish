<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadXefPmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_xef_pms')->truncate();
        DB::table('lead_xef_pms')->insert([
            ['name' => 'ibelsa','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Medallion','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Rocketbeds','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'SIHOT','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Tesipro','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'ACIGRUP','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'LEAN Hotel','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'protel','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Mews Systems','created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
