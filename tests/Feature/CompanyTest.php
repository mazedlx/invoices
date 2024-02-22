<?php

namespace Tests\Feature;

use App\Company;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_show_companies()
    {
        $response = $this->get(route('companies.index'));

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function users_can_view_companies()
    {
        $response = $this->actingAs(User::factory()->create())
            ->get(route('companies.index'));

        $response->assertOk();
    }

    /** @test */
    public function users_can_create_companies()
    {
        $this->actingAs(User::factory()->create())
            ->post(route('companies.store'), [
                'name' => 'Acme Corp.',
            ]);

        tap(Company::first(), function ($company) {
            $this->assertSame('Acme Corp.', $company->name);
        });
    }

    /** @test */
    public function companies_can_be_updated()
    {
        $company = Company::factory()->create(['name' => 'Old Corp.']);

        $this->actingAs(User::factory()->create())
            ->patch(route('companies.update', $company), [
                'name' => 'New Corp.',
            ]);

        tap($company->fresh(), function ($company) {
            $this->assertSame('New Corp.', $company->name);
        });
    }

    /** @test */
    public function name_is_required()
    {
        $company = Company::factory()->create(['name' => 'Old Corp.']);

        $response = $this->actingAs(User::factory()->create())
            ->post(route('companies.store', $company), [
                'name' => '',
            ]);

        $response->assertSessionHasErrors(['name']);
    }
}
