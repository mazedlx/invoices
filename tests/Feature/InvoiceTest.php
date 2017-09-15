<?php

namespace Tests\Feature;

use PDF;
use App\Customer;
use App\Invoice;
use App\Line;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $user = factory(User::class)->create();
        $this->actingAs($user);
    }

    /** @test */
    function invoices_can_be_shown()
    {
        $invoice = factory(Invoice::class)->create();

        $this->get('/invoices/' . $invoice->id)
            ->assertStatus(200)
            ->assertSee($invoice->amountInEuros);
    }

    /** @test */
    function invoices_can_be_created()
    {
        $invoice = factory(Invoice::class)->make();

        $this->post('/invoices', $invoice->toArray());

        $this->assertDatabaseHas('invoices', ['customer' => $invoice->customer]);
    }

    function new_invoices_get_the_next_incrementing_invoice_number()
    {
        $invoice = factory(Invoice::class)->make(['date' => '2017-05-03']);

        $this->post('/invoices', $invoice->toArray())
            ->assertStatus(200);
        $this->assertDatabaseHas('invoices', ['number' => '2017-01'])
            ->assertDatabaseHas('invoices', ['amount' => $invoice->amount]);

        $nexIinvoice = factory(Invoice::class)->make(['date' => '2017-05-03']);

        $this->post('/invoices', $nexIinvoice->toArray())
            ->assertStatus(200);
        $this->assertDatabaseHas('invoices', ['number' => '2017-02'])
            ->assertDatabaseHas('invoices', ['amount' => $nexIinvoice->amount]);
    }

    /** @test */
    function all_invoices_can_be_shown()
    {
        $invoices = factory(Invoice::class, 5)->create();

        $this->get('/invoices')
            ->assertViewIs('invoices.index')
            ->assertViewHas('invoices', Invoice::orderBy('date', 'desc')->paginate(5));
    }

    /** @test */
    function invoices_can_be_updated()
    {
        $invoice = factory(Invoice::class)->create(['customer' => 'New Customer']);

        $changed = $invoice->toArray();
        $changed['customer'] = 'Changed Customer';

        $this->patch('/invoices/' . $invoice->id, $changed);

        $this->assertDatabaseHas('invoices', ['id' => $invoice->id, 'customer' => 'Changed Customer']);
    }

    /** @test */
    function invoices_can_be_deleted()
    {
        $invoice = factory(Invoice::class)->create();
        $line = factory(Line::class, 3)->create(['invoice_id' => $invoice->id]);
        $this->delete('/invoices/' . $invoice->id);

        $this->assertDatabaseMissing('invoices', ['id' => $invoice->id]);
        $this->assertDatabaseMissing('lines', ['invoice_id' => $invoice->id]);
    }

    /** @test */
    function invoices_can_be_printed()
    {
        $invoice = factory(Invoice::class)->create();
        $line = factory(Line::class, 3)->create(['invoice_id' => $invoice->id]);

        $this->get('/invoices/' . $invoice->id . '/print')
            ->assertStatus(200);
    }
}
