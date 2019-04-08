<?php

use Illuminate\Database\Seeder;

class LeadSoftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_soft')->truncate();
        DB::table('lead_soft')->insert([
            ['type' => 1,'soft_type_id' => 1,'name' => 'Gstock','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1,'soft_type_id' => 1,'name' => 'CHef Control','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1,'soft_type_id' => 1,'name' => 'Distrito K','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1,'soft_type_id' => 2,'name' => 'GIRnet','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1,'soft_type_id' => 3,'name' => 'Revo Flow','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1,'soft_type_id' => 3,'name' => 'CoverManager','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1,'soft_type_id' => 3,'name' => 'ElTenedor','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1,'soft_type_id' => 3,'name' => 'RESTO','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1,'soft_type_id' => 4,'name' => 'Deliveroo','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1,'soft_type_id' => 4,'name' => 'Glovo','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 1,'soft_type_id' => 5,'name' => 'tSpoonLab','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2,'soft_type_id' => 2,'name' => 'GIRnet','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2,'soft_type_id' => 6,'name' => 'PrestaShop','created_at' => new DateTime,'updated_at' => new DateTime],
            ['type' => 2,'soft_type_id' => 6,'name' => 'WooCommerce','created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
