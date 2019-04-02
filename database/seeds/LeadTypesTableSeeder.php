<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class LeadTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_types')->truncate();
        DB::table('lead_types')->insert([
            ['name' => 'Xef','class' => 'dep.xef','ordern' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Retail','class' => 'dep.retail','ordern' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
