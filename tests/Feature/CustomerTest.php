<?php

namespace Tests\Feature;

use App\Customer;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

    /** @test */
    function customers_can_be_shown()
    {
        factory(Customer::class, 5)->create();

        $this->get('/customers')
            ->assertViewIs('customers.index', Customer::orderBy('name')->paginate(5));
    }

    /** @test */
    function customers_can_be_created()
    {
        $customer = factory(Customer::class)->make();
        $this->post('/customers', $customer->toArray());

        $this->assertDatabaseHas('customers', $customer->toArray());
    }

    /** @test */
    function customers_can_be_updated()
    {
        $customer = factory(Customer::class)->create();
        $changedCustomer = factory(Customer::class)->make(['name' => 'New Name']);

        $this->patch('/customers/' . $customer->id, $changedCustomer->toArray());

        $this->assertDatabaseHas('customers', $changedCustomer->toArray());
    }
}
