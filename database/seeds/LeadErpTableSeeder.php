<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadErpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_erp')->truncate();
        DB::table('lead_erp')->insert([
            ['name' => 'Sage X3','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Sage 200cloud','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Sage Business One','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'A3','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'SAP','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Corus','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'EXTRASOFT','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'CONTASOL','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'NetSuite','created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Datisa','created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
