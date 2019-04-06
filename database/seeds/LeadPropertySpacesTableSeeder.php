<?php

use Illuminate\Database\Seeder;

class LeadPropertySpacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_property_spaces')->truncate();
        DB::table('lead_property_spaces')->insert([
            ['type' => '1','name' => 'No','order' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => '1','name' => 'Terraza','order' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => '1','name' => 'Comedores separados','order' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => '2','name' => 'Estándar','order' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => '2','name' => 'Diferentes áreas / plantas','order' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => '2','name' => 'Locales separados','order' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
