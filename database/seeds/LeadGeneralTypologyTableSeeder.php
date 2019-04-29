<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadGeneralTypologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_general_typologies')->truncate();
        DB::table('lead_general_typologies')->insert([
            ['type' => 1, 'proposal_id' => 20,'name' => 'Cafetería','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 19,'name' => 'Bar','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 21,'name' => 'Restaurante','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 26,'name' => 'Discoteca','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 23,'name' => 'Take away','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 24,'name' => 'Delivery','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 22,'name' => 'Hotel','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 25,'name' => 'Kiosk','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 27,'name' => 'Panadería','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 29,'name' => 'Foodtruck','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 30,'name' => 'Comida al peso','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 31,'name' => 'Solo eventos','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 39,'name' => 'Retail store','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 34,'name' => 'Distribución de productos y Fuerza comercial','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 32,'name' => 'Autoventa / movilidad','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 38,'name' => 'Peluquería / estética','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 28,'name' => 'Panadería','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 40,'name' => 'Venta a granel','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 33,'name' => 'Aviación / transporte','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 36,'name' => 'Eventos / corners','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 35,'name' => 'Espectáculos','created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::table('general_typologies_related_proposals')->insert([
            ['general_typology_id' => 20,'related_proposal_id' => 5],
            ['general_typology_id' => 20,'related_proposal_id' => 15],
            ['general_typology_id' => 20,'related_proposal_id' => 8],
            ['general_typology_id' => 20,'related_proposal_id' => 11],
            ['general_typology_id' => 19,'related_proposal_id' => 5],
            ['general_typology_id' => 19,'related_proposal_id' => 15],
            ['general_typology_id' => 19,'related_proposal_id' => 8],
            ['general_typology_id' => 19,'related_proposal_id' => 11],
            ['general_typology_id' => 21,'related_proposal_id' => 5],
            ['general_typology_id' => 21,'related_proposal_id' => 15],
            ['general_typology_id' => 21,'related_proposal_id' => 8],
            ['general_typology_id' => 21,'related_proposal_id' => 11],
            ['general_typology_id' => 21,'related_proposal_id' => 13],
            ['general_typology_id' => 26,'related_proposal_id' => 5],
            ['general_typology_id' => 26,'related_proposal_id' => 15],
            ['general_typology_id' => 26,'related_proposal_id' => 8],
            ['general_typology_id' => 26,'related_proposal_id' => 11],
            ['general_typology_id' => 23,'related_proposal_id' => 5],
            ['general_typology_id' => 23,'related_proposal_id' => 15],
            ['general_typology_id' => 23,'related_proposal_id' => 8],
            ['general_typology_id' => 23,'related_proposal_id' => 13],
            ['general_typology_id' => 24,'related_proposal_id' => 5],
            ['general_typology_id' => 24,'related_proposal_id' => 15],
            ['general_typology_id' => 24,'related_proposal_id' => 8],
            ['general_typology_id' => 24,'related_proposal_id' => 13],
            ['general_typology_id' => 24,'related_proposal_id' => 9],
            ['general_typology_id' => 22,'related_proposal_id' => 5],
            ['general_typology_id' => 22,'related_proposal_id' => 15],
            ['general_typology_id' => 22,'related_proposal_id' => 8],
            ['general_typology_id' => 22,'related_proposal_id' => 13],
            ['general_typology_id' => 22,'related_proposal_id' => 9],
            ['general_typology_id' => 22,'related_proposal_id' => 14],
            ['general_typology_id' => 25,'related_proposal_id' => 14],
            ['general_typology_id' => 25,'related_proposal_id' => 5],
            ['general_typology_id' => 25,'related_proposal_id' => 15],
            ['general_typology_id' => 25,'related_proposal_id' => 8],
            ['general_typology_id' => 25,'related_proposal_id' => 13],
            ['general_typology_id' => 27,'related_proposal_id' => 5],
            ['general_typology_id' => 27,'related_proposal_id' => 15],
            ['general_typology_id' => 27,'related_proposal_id' => 8],
            ['general_typology_id' => 27,'related_proposal_id' => 10],
            ['general_typology_id' => 29,'related_proposal_id' => 5],
            ['general_typology_id' => 29,'related_proposal_id' => 15],
            ['general_typology_id' => 29,'related_proposal_id' => 8],
            ['general_typology_id' => 30,'related_proposal_id' => 5],
            ['general_typology_id' => 30,'related_proposal_id' => 15],
            ['general_typology_id' => 30,'related_proposal_id' => 8],
            ['general_typology_id' => 30,'related_proposal_id' => 10],
            ['general_typology_id' => 30,'related_proposal_id' => 13],
            ['general_typology_id' => 39,'related_proposal_id' => 5],
            ['general_typology_id' => 39,'related_proposal_id' => 15],
            ['general_typology_id' => 39,'related_proposal_id' => 8],
            ['general_typology_id' => 34,'related_proposal_id' => 15],
            ['general_typology_id' => 32,'related_proposal_id' => 8],
            ['general_typology_id' => 38,'related_proposal_id' => 5],
            ['general_typology_id' => 38,'related_proposal_id' => 15],
            ['general_typology_id' => 38,'related_proposal_id' => 8],
            ['general_typology_id' => 38,'related_proposal_id' => 12],
            ['general_typology_id' => 28,'related_proposal_id' => 5],
            ['general_typology_id' => 28,'related_proposal_id' => 15],
            ['general_typology_id' => 28,'related_proposal_id' => 8],
            ['general_typology_id' => 40,'related_proposal_id' => 5],
            ['general_typology_id' => 40,'related_proposal_id' => 15],
            ['general_typology_id' => 40,'related_proposal_id' => 8],
            ['general_typology_id' => 33,'related_proposal_id' => 5],
            ['general_typology_id' => 33,'related_proposal_id' => 15],
            ['general_typology_id' => 33,'related_proposal_id' => 8],
            ['general_typology_id' => 36,'related_proposal_id' => 5],
            ['general_typology_id' => 36,'related_proposal_id' => 15],
            ['general_typology_id' => 36,'related_proposal_id' => 8],
            ['general_typology_id' => 35,'related_proposal_id' => 5],
            ['general_typology_id' => 35,'related_proposal_id' => 15],
            ['general_typology_id' => 35,'related_proposal_id' => 8],
            ['general_typology_id' => 35,'related_proposal_id' => 12],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
