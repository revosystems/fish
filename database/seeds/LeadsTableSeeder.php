<?php

use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('leads')->truncate();
        factory(Lead::class, 2)->create(['user_id' => factory(User::class)->create()->id]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
