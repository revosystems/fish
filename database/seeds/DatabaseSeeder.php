<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(LeadErpTableSeeder::class);
        $this->call(LeadPosTableSeeder::class);
        $this->call(LeadPosTypesTableSeeder::class);
        $this->call(LeadPropertySpacesTableSeeder::class);
        $this->call(LeadGeneralTypologyTableSeeder::class);
        $this->call(LeadXefPmsTableSeeder::class);
    }
}
