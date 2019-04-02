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
            ['lead_type_id' => '1','name' => 'No','ordern' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_type_id' => '1','name' => 'Terraza','ordern' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_type_id' => '1','name' => 'Comedores separados','ordern' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_type_id' => '2','name' => 'Estándar','ordern' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_type_id' => '2','name' => 'Diferentes áreas / plantas','ordern' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_type_id' => '2','name' => 'Locales separados','ordern' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
