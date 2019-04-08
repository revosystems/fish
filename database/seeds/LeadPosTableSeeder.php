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
            ['name' => 'Ágora','pos_type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'BDP','pos_type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Cuiner','pos_type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Dual link','pos_type_id' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'GASTROFIX','pos_type_id' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'GLOP','pos_type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'ICG','pos_type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'ICG HioPOS','pos_type_id' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Hosteltáctil','pos_type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Sighore-ICS','pos_type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'L\'Addition','pos_type_id' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Lightspeed','pos_type_id' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Miss Tipsi','pos_type_id' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'NCR Aloha','pos_type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Numier','pos_type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Oracle Micros','pos_type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Storyous','pos_type_id' => 2,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Techni-Web','pos_type_id' => 1,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'Tiller','pos_type_id' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
            ['name' => 'TouchBistro','pos_type_id' => 3,'created_at' => new DateTime,'updated_at' => new DateTime],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
