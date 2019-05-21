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
            ['pos_type_id' => 1, 'name' => 'Ágora'],
            ['pos_type_id' => 1, 'name' => 'BDP'],
            ['pos_type_id' => 1, 'name' => 'Cuiner'],
            ['pos_type_id' => 3, 'name' => 'Dual link'],
            ['pos_type_id' => 3, 'name' => 'GASTROFIX'],
            ['pos_type_id' => 1, 'name' => 'GLOP'],
            ['pos_type_id' => 1, 'name' => 'ICG'],
            ['pos_type_id' => 2, 'name' => 'ICG HioPOS'],
            ['pos_type_id' => 1, 'name' => 'Hosteltáctil'],
            ['pos_type_id' => 1, 'name' => 'Sighore-ICS'],
            ['pos_type_id' => 3, 'name' => 'L\'Addition'],
            ['pos_type_id' => 3, 'name' => 'Lightspeed'],
            ['pos_type_id' => 2, 'name' => 'Miss Tipsi'],
            ['pos_type_id' => 1, 'name' => 'NCR Aloha'],
            ['pos_type_id' => 1, 'name' => 'Numier'],
            ['pos_type_id' => 1, 'name' => 'Oracle Micros'],
            ['pos_type_id' => 2, 'name' => 'Storyous'],
            ['pos_type_id' => 1, 'name' => 'Techni-Web'],
            ['pos_type_id' => 3, 'name' => 'Tiller'],
            ['pos_type_id' => 3, 'name' => 'TouchBistro'],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
