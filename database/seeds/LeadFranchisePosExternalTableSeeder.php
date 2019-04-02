<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadFranchisePosExternalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_franchise_pos_external')->truncate();
        DB::table('lead_franchise_pos_external')->insert([
            ['name' => 'Sí','ordern' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'No','ordern' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
