<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadXefPropertySpacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_xef_property_spaces')->truncate();
        DB::table('lead_xef_property_spaces')->insert([
            ['name' => 'No','ordern' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Terraza','ordern' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Comedores separados','ordern' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
