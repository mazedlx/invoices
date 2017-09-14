<?php

namespace Tests\Feature;

use App\Customer;
use App\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function an_invoice_can_be_shown()
    {
        $invoice = factory(Invoice::class)->create();

        $this->get('/invoices/' . $invoice->id)
            ->assertStatus(200)
            ->assertSee($invoice->amountInEuros);
    }

    /** @test */
    function an_invoice_can_be_created()
    {
        $invoice = factory(Invoice::class)->make();

        $this->post('/invoices', $invoice->toArray());

        $this->assertDatabaseHas('invoices', ['customer' => $invoice->customer]);
    }

    function a_new_invoice_gets_the_next_invoice_number()
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
    function an_invoice_can_be_updated()
    {
        $invoice = factory(Invoice::class)->create(['customer' => 'New Customer']);

        $changed = $invoice->toArray();
        $changed['customer'] = 'Changed Customer';

        $this->patch('/invoices/' . $invoice->id, $changed);

        $this->assertDatabaseHas('invoices', ['id' => $invoice->id, 'customer' => 'Changed Customer']);
    }
}
