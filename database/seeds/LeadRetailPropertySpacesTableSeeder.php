<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadRetailPropertySpacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_retail_property_spaces')->truncate();
        DB::table('lead_retail_property_spaces')->insert([
            ['name' => 'Estándar','ordern' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Diferentes áreas / plantas','ordern' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Locales separados','ordern' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
