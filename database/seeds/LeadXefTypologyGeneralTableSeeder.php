<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadXefTypologyGeneralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_xef_typology_general')->truncate();
        DB::table('lead_xef_typology_general')->insert([
            ['lead_proposal_id' => 20,'related_proposal_id' => '5,15,8,11','name' => 'Cafetería','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 19,'related_proposal_id' => '5,15,8,11','name' => 'Bar','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 21,'related_proposal_id' => '5,15,8,11,13','name' => 'Restaurante','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 26,'related_proposal_id' => '5,15,8,11','name' => 'Discoteca','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 23,'related_proposal_id' => '5,15,8,13','name' => 'Take away','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 24,'related_proposal_id' => '5,15,8,13,9','name' => 'Delivery','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 22,'related_proposal_id' => '5,15,8,13,9,14','name' => 'Hotel','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 25,'related_proposal_id' => '14,5,15,8,13','name' => 'Kiosk','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 27,'related_proposal_id' => '5,15,8,10','name' => 'Panadería','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 29,'related_proposal_id' => '5,15,8','name' => 'Foodtruck','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 30,'related_proposal_id' => '5,15,8,10,13','name' => 'Comida al peso','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 31,'related_proposal_id' => null,'name' => 'Solo eventos','created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
