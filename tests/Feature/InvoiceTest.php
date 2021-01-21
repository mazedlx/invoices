<?php

namespace Tests\Feature;

use App\Customer;
use App\Invoice;
use App\Line;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_cannot_view_invoices()
    {
        $response = $this->get(route('invoices.index'));

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function users_can_view_invoices()
    {
        $response = $this->actingAs(User::factory()->create())
            ->get(route('invoices.index'));

        $response->assertOk();
    }

    /** @test */
    public function user_can_create_invoices()
    {
        $this->actingAs(User::factory()->create())
            ->post(route('invoices.store'), [
                'address' => 'Larastreet 1',
                'city' => 'Laraville',
                'country' => 'USA',
                'date' => '2020-03-01',
                'number' => '2020-01',
                'paid' => false,
                'zip' => '12345',
                'customer_id' => Customer::factory()->create()->id,
                'tasks' => [
                    'Task 1',
                    'Task 2',
                ],
                'rates' => [
                    9500,
                    8200,
                ],
                'times' => [
                    1,
                    2,
                ],
            ]);

        tap(Invoice::first(), function ($invoice) {
            $this->assertSame('2020-01', $invoice->number);
            $this->assertSame('Larastreet 1', $invoice->address);
            $this->assertSame('Laraville', $invoice->city);
            $this->assertSame('USA', $invoice->country);
            $this->assertSame('2020-03-01', $invoice->date->format('Y-m-d'));
            $this->assertFalse($invoice->paid);
            $this->assertSame('12345', $invoice->zip);
            $this->assertTrue(Customer::first()->is($invoice->customer));
            $this->assertCount(2, $invoice->lines);
        });
    }

    /** @test */
    public function users_can_update_invoices()
    {
        $invoice = Invoice::factory()->create();

        $this->actingAs(User::factory()->create())
            ->patch(route('invoices.update', $invoice), [
                'address' => 'Larastreet 2',
                'city' => 'Laratown',
                'country' => 'CA',
                'date' => '2020-04-02',
                'number' => '2020-02',
                'paid' => true,
                'zip' => '90210',
                'customer_id' => Customer::factory()->create()->id,
                'tasks' => [
                    'Task 1a',
                    'Task 2b',
                ],
                'rates' => [
                    6300,
                ],
                'times' => [
                    2,
                ],
            ]);

        tap($invoice->fresh(), function ($invoice) {
            $this->assertSame('Larastreet 2', $invoice->address);
            $this->assertSame('Laratown', $invoice->city);
            $this->assertSame('CA', $invoice->country);
            $this->assertSame('2020-04-02', $invoice->date->format('Y-m-d'));
            $this->assertTrue($invoice->paid);
            $this->assertSame('90210', $invoice->zip);
            $this->assertTrue(Customer::first()->is($invoice->customer));
            $this->assertCount(1, $invoice->lines);
        });
    }

    /** @test */
    public function users_can_delete_invoices()
    {
        $invoice = Invoice::factory()->has(Line::factory()->count(3))->create();
        $this->assertCount(1, Invoice::all());
        $this->assertCount(3, Line::all());

        $this->actingAs(User::factory()->create())
            ->delete(route('invoices.destroy', $invoice));

        $this->assertCount(0, Invoice::all());
        $this->assertCount(0, Line::all());
    }

    /** @test */
    public function address_is_required()
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('invoices.store'), [
                'address' => '',
            ]);

        $response->assertSessionHasErrors(['address']);
    }

    /** @test */
    public function city_is_required()
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('invoices.store'), [
                'city' => '',
            ]);

        $response->assertSessionHasErrors(['city']);
    }

    /** @test */
    public function zip_is_required()
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('invoices.store'), [
                'zip' => '',
            ]);

        $response->assertSessionHasErrors(['zip']);
    }

    /** @test */
    public function customer_id_is_required_if_company_id_is_empty()
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('invoices.store'), [
                'customer_id' => '',
                'company_id' => '',
            ]);

        $response->assertSessionHasErrors(['customer_id']);
    }

    /** @test */
    public function company_id_is_not_required_if_customer_id_is_not_empty()
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('invoices.store'), [
                'customer_id' => '1',
                'company_id' => '',
            ]);

        $response->assertSessionDoesntHaveErrors(['company_id']);
    }

    /** @test */
    public function date_is_required()
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('invoices.store'), [
                'date' => '',
            ]);

        $response->assertSessionHasErrors(['date']);
    }

    /** @test */
    public function date_must_be_a_date()
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('invoices.store'), [
                'date' => 'not-a-date',
            ]);

        $response->assertSessionHasErrors(['date']);
    }

    /** @test */
    public function date_must_be_a_date_of_formt_ymd()
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('invoices.store'), [
                'date' => '20.03.2020',
            ]);

        $response->assertSessionHasErrors(['date']);
    }
}
