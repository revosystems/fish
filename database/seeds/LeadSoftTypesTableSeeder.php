<?php

use Illuminate\Database\Seeder;

class LeadSoftTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_soft_types')->truncate();
        DB::table('lead_soft_types')->insert([
            ['related_proposal_id' => '42','name' => 'Almacén y compras','ordern' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['related_proposal_id' => '43','name' => 'BI / Gestión de personal','ordern' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['related_proposal_id' => '47','name' => 'Reservas','ordern' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['related_proposal_id' => '44','name' => 'Delivery','ordern' => 4,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['related_proposal_id' => '46','name' => 'Recetas','ordern' => 5,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['related_proposal_id' => '45','name' => 'eCommerce','ordern' => 6,'created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
