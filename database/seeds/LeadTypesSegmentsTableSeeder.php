<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class LeadTypesSegmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_types_segments')->truncate();
        DB::table('lead_types_segments')->insert([
            ['type' => 1, 'name' => 'Pequeño','class_helper' => 'dep_xef_small','order' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'name' => 'Mediano','class_helper' => 'dep_xef_medium-large','order' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'name' => 'Grande','class_helper' => 'dep_xef_medium-large','order' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'name' => 'Tienda','class_helper' => 'dep_retail_store','order' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'name' => 'Cadena o franquicia','class_helper' => 'dep_retail_franchise','order' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
