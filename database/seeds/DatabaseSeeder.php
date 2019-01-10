<?php

use App\Lead;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = factory(User::class)->create([
            "email" => "jordi.p@revo.works",
            "admin" => true,
        ]);
        factory(Lead::class, 50)->create(['user_id' => $user->id]);
        factory(Lead::class, 25)->create(['user_id' => factory(User::class)->create()->id]);
        factory(Lead::class, 25)->create(['user_id' => factory(User::class)->create()->id]);
    }
}
