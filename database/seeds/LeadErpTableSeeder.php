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
            ['name' => 'Sage X3'],
            ['name' => 'Sage 200cloud'],
            ['name' => 'Sage Business One'],
            ['name' => 'A3'],
            ['name' => 'SAP'],
            ['name' => 'Corus'],
            ['name' => 'EXTRASOFT'],
            ['name' => 'CONTASOL'],
            ['name' => 'NetSuite'],
            ['name' => 'Datisa'],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
