<?php

namespace Tests\Unit;

use App\Models\Lead;
use App\Models\Organization;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class OrganizationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_get_parent_organizations_from_organization()
    {
        $parentOrganization = factory(Organization::class)->create(["name" => "Parent Organization"]);
        $childOrganization  = factory(Organization::class)->create(["name" => "Child Organization", "organization_id" => $parentOrganization->id]);

        $parentOrganizations = $childOrganization->getParentOrganizations();

        $this->assertCount(1, $parentOrganizations);
        $this->assertEquals($parentOrganization->name, $parentOrganizations[0]->name);
    }

    /** @test */
    public function can_get_parent_organizations_from_organization_without_parent()
    {
        $notParentOrganization  = factory(Organization::class)->create(["name" => "Parent Organization"]);
        $childOrganization      = factory(Organization::class)->create(["name" => "Child Organization", "organization_id" => null]);

        $parentOrganizations = $childOrganization->getParentOrganizations();

        $this->assertCount(0, $parentOrganizations);
    }

    /** @test */
    public function can_get_parent_organizations_from_organization_with_2_parent_organizations()
    {
        $parentOrganization     = factory(Organization::class)->create(["name" => "Parent Organization"]);
        $childOrganization1     = factory(Organization::class)->create(["name" => "Child Organization 1", "organization_id" => $parentOrganization]);
        $childOrganization2     = factory(Organization::class)->create(["name" => "Child Organization 2", "organization_id" => $childOrganization1]);

        $parentOrganizations = $childOrganization2->getParentOrganizations();

        $this->assertCount(2, $parentOrganizations);
        $this->assertEquals($parentOrganization->name, $parentOrganizations[0]->name);
        $this->assertEquals($childOrganization1->name, $parentOrganizations[1]->name);
    }

    /** @test */
    public function can_get_parent_organizations_from_organization_with_multiple_parent_organizations()
    {
        $parentOrganization     = factory(Organization::class)->create(["name" => "Parent Organization"]);
        $childOrganization1     = factory(Organization::class)->create(["name" => "Child Organization 1", "organization_id" => $parentOrganization]);
        $childOrganization2     = factory(Organization::class)->create(["name" => "Child Organization 2", "organization_id" => $childOrganization1]);
        $childOrganization3     = factory(Organization::class)->create(["name" => "Child Organization 3", "organization_id" => $childOrganization2]);
        $childOrganization4     = factory(Organization::class)->create(["name" => "Child Organization 4", "organization_id" => $childOrganization3]);

        $parentOrganizations = $childOrganization4->getParentOrganizations();

        $this->assertCount(4, $parentOrganizations);
        $this->assertEquals($parentOrganization->name, $parentOrganizations[0]->name);
        $this->assertEquals($childOrganization1->name, $parentOrganizations[1]->name);
        $this->assertEquals($childOrganization2->name, $parentOrganizations[2]->name);
        $this->assertEquals($childOrganization3->name, $parentOrganizations[3]->name);
    }

    /** @test */
    public function can_get_lead_parent_organization()
    {
        $organization = factory(Organization::class)->create(["name" => "Parent Organization"]);
        $lead               = factory(Lead::class)->create(["name" => "Lead", "organization_id" => $organization->id]);

        $parentOrganizations = $lead->getParentOrganizations();

        $this->assertCount(1, $parentOrganizations);
        $this->assertEquals($organization->name, $parentOrganizations[0]->name);
    }

    /** @test */
    public function can_get_lead_parent_organizations_from_organization_with_multiple_parent_organizations()
    {
        $parentOrganization     = factory(Organization::class)->create(["name" => "Parent Organization"]);
        $childOrganization1     = factory(Organization::class)->create(["name" => "Child Organization 1", "organization_id" => $parentOrganization]);
        $childOrganization2     = factory(Organization::class)->create(["name" => "Child Organization 2", "organization_id" => $childOrganization1]);
        $otherOrganization      = factory(Organization::class)->create(["name" => "Other Organization", "organization_id" => null]);
        $childOrganization3     = factory(Organization::class)->create(["name" => "Child Organization 3", "organization_id" => $childOrganization2]);
        $lead               = factory(Lead::class)->create(["name" => "Lead", "organization_id" => $childOrganization3->id]);

        $parentOrganizations = $lead->getParentOrganizations();

        $this->assertCount(4, $parentOrganizations);
        $this->assertEquals("Parent Organization", $parentOrganizations[0]->name);
        $this->assertEquals("Child Organization 1", $parentOrganizations[1]->name);
        $this->assertEquals("Child Organization 2", $parentOrganizations[2]->name);
        $this->assertEquals("Child Organization 3", $parentOrganizations[3]->name);
    }
}
