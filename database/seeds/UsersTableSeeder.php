<?php

use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        $user = factory(User::class)->create([
            'name'      => 'Jordi',
            'surname1'  => 'Pugdellívol',
            'email'     => 'jordi.p@revo.works',
            'admin'     => true,
            'active'    => 1
        ]);
        factory(Lead::class)->create(['user_id' => $user->id]);

        $user = factory(User::class)->create([
            'name'      => 'Albert',
            'surname1'  => 'Filella',
            'email'     => 'info@netmotor.es',
            'admin'     => true,
            'active'    => 1
        ]);
        factory(Lead::class)->create(['user_id' => $user->id]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
