<?php

namespace Tests\Feature;

use App\Company;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

    /** @test */
    public function all_companies_can_be_shown()
    {
        $this->withoutExceptionHandling();

        $company = factory(Company::class, 5)->create();

        $this->get('/companies')
            ->assertViewIs('companies.index', ['companies' => Company::orderBy('name')->paginate(5)]);
    }

    /** @test */
    public function companies_can_be_created()
    {
        $company = factory(Company::class)->make();

        $this->post('/companies', $company->toArray());

        $this->assertDatabaseHas('companies', $company->toArray());
    }

    /** @test */
    public function companies_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $company = factory(Company::class)->create(['name' => 'New name']);
        $changedCompany = factory(Company::class)->make(['name' => 'Changed Name']);

        $this->patch('/companies/' . $company->id, $changedCompany->toArray());

        $this->assertDatabaseHas('companies', ['name' => 'Changed Name']);
    }
}
