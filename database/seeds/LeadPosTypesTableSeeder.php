<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadPosTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_pos_types')->truncate();
        DB::table('lead_pos_types')->insert([
            ['related_proposal_id' => '18','name' => 'Legacy','created_at' => new DateTime,'updated_at' => new DateTime],
            ['related_proposal_id' => '49','name' => 'Cloud','created_at' => new DateTime,'updated_at' => new DateTime],
            ['related_proposal_id' => '50','name' => 'iOs','created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
