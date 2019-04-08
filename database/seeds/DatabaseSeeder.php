<?php

use App\Models\Lead;
use App\Models\User;
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
        $this->call(LeadDevicesTableSeeder::class);
        $this->call(LeadErpTableSeeder::class);
        $this->call(LeadFranchisePosExternalTableSeeder::class);
        $this->call(LeadPosTableSeeder::class);
        $this->call(LeadPosTypesTableSeeder::class);
        $this->call(LeadPropertySpacesTableSeeder::class);
        //$this->call(LeadRetailPropertySpacesTableSeeder::class);
        $this->call(LeadRetailSaleLocationsTableSeeder::class);
        $this->call(LeadRetailSaleModesTableSeeder::class);
        $this->call(LeadRetailTypologyGeneralTableSeeder::class);
        $this->call(LeadTypesTableSeeder::class);
        $this->call(LeadTypesSegmentsTableSeeder::class);
        $this->call(LeadXefKdsTableSeeder::class);
        $this->call(LeadXefPmsTableSeeder::class);
        $this->call(LeadXefPropertyFranchiseTableSeeder::class);
        //$this->call(LeadXefPropertySpacesTableSeeder::class);
        $this->call(LeadXefTypologyGeneralTableSeeder::class);
        $this->call(LeadXefTypologySpecificTableSeeder::class);
    }
}
