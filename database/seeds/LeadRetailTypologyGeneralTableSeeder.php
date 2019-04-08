<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadRetailTypologyGeneralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_retail_typology_general')->truncate();
        DB::table('lead_retail_typology_general')->insert([
            ['lead_proposal_id' => 39,'related_proposal_id' => '5,15,8','name' => 'Retail store','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 34,'related_proposal_id' => '15,8','name' => 'Distribución de productos y Fuerza comercial','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 32,'related_proposal_id' => '15,8','name' => 'Autoventa / movilidad','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 38,'related_proposal_id' => '5,15,8,12','name' => 'Peluquería / estética','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 28,'related_proposal_id' => '5,15,8','name' => 'Panadería','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 40,'related_proposal_id' => '5,15,8','name' => 'Venta a granel','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 33,'related_proposal_id' => '5,15,8','name' => 'Aviación / transporte','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 36,'related_proposal_id' => '5,15,8','name' => 'Eventos / corners','created_at' => new DateTime,'updated_at' => new DateTime],
            ['lead_proposal_id' => 35,'related_proposal_id' => '5,15,8,12','name' => 'Espectáculos','created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
