<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadPosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('lead_pos')->truncate();
        DB::table('lead_pos')->insert([
            ['name' => 'Ágora','typde_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'BDP','type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Cuiner','type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Dual link','type_id' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'GASTROFIX','type_id' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'GLOP','type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'ICG','type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'ICG HioPOS','type_id' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Hosteltáctil','type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Sighore-ICS','type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'L\'Addition','type_id' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Lightspeed','type_id' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Miss Tipsi','type_id' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'NCR Aloha','type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Numier','type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Oracle Micros','type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Storyous','type_id' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Techni-Web','type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Tiller','type_id' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'TouchBistro','type_id' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
