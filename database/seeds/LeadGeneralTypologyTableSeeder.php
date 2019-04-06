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
            ['type' => 1, 'proposal_id' => 20,'related_proposal_id' => '5,15,8,11','name' => 'Cafetería','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 19,'related_proposal_id' => '5,15,8,11','name' => 'Bar','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 21,'related_proposal_id' => '5,15,8,11,13','name' => 'Restaurante','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 26,'related_proposal_id' => '5,15,8,11','name' => 'Discoteca','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 23,'related_proposal_id' => '5,15,8,13','name' => 'Take away','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 24,'related_proposal_id' => '5,15,8,13,9','name' => 'Delivery','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 22,'related_proposal_id' => '5,15,8,13,9,14','name' => 'Hotel','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 25,'related_proposal_id' => '14,5,15,8,13','name' => 'Kiosk','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 27,'related_proposal_id' => '5,15,8,10','name' => 'Panadería','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 29,'related_proposal_id' => '5,15,8','name' => 'Foodtruck','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 30,'related_proposal_id' => '5,15,8,10,13','name' => 'Comida al peso','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1, 'proposal_id' => 31,'related_proposal_id' => null,'name' => 'Solo eventos','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 39,'related_proposal_id' => '5,15,8','name' => 'Retail store','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 34,'related_proposal_id' => '15,8','name' => 'Distribución de productos y Fuerza comercial','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 32,'related_proposal_id' => '15,8','name' => 'Autoventa / movilidad','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 38,'related_proposal_id' => '5,15,8,12','name' => 'Peluquería / estética','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 28,'related_proposal_id' => '5,15,8','name' => 'Panadería','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 40,'related_proposal_id' => '5,15,8','name' => 'Venta a granel','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 33,'related_proposal_id' => '5,15,8','name' => 'Aviación / transporte','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 36,'related_proposal_id' => '5,15,8','name' => 'Eventos / corners','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2, 'proposal_id' => 35,'related_proposal_id' => '5,15,8,12','name' => 'Espectáculos','created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
