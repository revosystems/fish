<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class LeadXefTypologySpecificTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_xef_typology_specific')->truncate();
        DB::table('lead_xef_typology_specific')->insert([
            ['name' => 'Carta','ordern' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Eventos','ordern' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Menú','ordern' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}