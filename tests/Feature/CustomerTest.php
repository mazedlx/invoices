<?php

namespace Tests\Feature;

use App\Customer;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_view_customers()
    {
        $response = $this->get(route('customers.index'));

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function user_can_view_customers()
    {
        $response = $this->actingAs(User::factory()->create())
            ->get(route('customers.index'));

        $response->assertOk();
    }

    /** @test */
    public function user_can_create_customers()
    {
        $this->actingAs(User::factory()->create())
            ->post(route('customers.store'), [
                'name' => 'Bob Doe',
            ]);

        tap(Customer::first(), function ($customer) {
            $this->assertSame('Bob Doe', $customer->name);
        });
    }

    /** @test */
    public function users_can_update_customers()
    {
        $customer = Customer::factory()->create();

        $this->actingAs(User::factory()->create())
            ->patch(route('customers.update', $customer), [
                'name' => 'Jane Doe',
            ]);

        tap($customer->fresh(), function ($customer) {
            $this->assertSame('Jane Doe', $customer->name);
        });
    }

    /** @test */
    public function name_is_required()
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('customers.store'), [
                'name' => '',
            ]);

        $response->assertSessionHasErrors(['name']);
    }
}
