<?php

namespace Tests\Unit;

use App\Customer;
use App\Invoice;
use App\Line;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function invoices_have_a_recipient()
    {
        $invoice = factory(Invoice::class)->create();

        $recipient = $invoice->recipient;

        $this->assertEquals(
            implode('<br>', [
                $invoice->company->name,
                $invoice->customer->name,
                $invoice->address,
                $invoice->zip . ' ' . $invoice->city,
            ]), $recipient
        );
    }

    /** @test */
    function invoices_can_generate_an_invoice_number()
    {
        factory(Invoice::class)->create(['date' => '2017-02-01']);
        factory(Invoice::class)->create(['date' => '2017-05-03']);
        factory(Invoice::class)->create(['date' => '2017-06-07']);

        $this->assertEquals('2017-04', Invoice::generateNumber('2017-08-09 00:00:00'));
    }

    /** @test */
    function invoices_can_calculate_their_amount()
    {
        $invoice = factory(Invoice::class)->create();
        factory(Line::class)->create(['invoice_id' => $invoice->id, 'rate' => 9000, 'time' => 100]);
        factory(Line::class)->create(['invoice_id' => $invoice->id, 'rate' => 9000, 'time' => 50]);
        factory(Line::class)->create(['invoice_id' => $invoice->id, 'rate' => 9000, 'time' => 75]);

        $this->assertEquals('202,50', $invoice->amountInEuros);
    }

    /** @test */
    function invoice_can_calculate_their_yearly_totals()
    {
        $firstInvoice = factory(Invoice::class)->create(['date' => '2016-01-01', 'number' => '2016-01']);
        factory(Line::class)->create(['invoice_id' => $firstInvoice->id, 'rate' => 9000, 'time' => 100]);
        $secondInvoice = factory(Invoice::class)->create(['date' => '2016-03-23', 'number' => '2016-02']);
        factory(Line::class)->create(['invoice_id' => $secondInvoice->id, 'rate' => 9000, 'time' => 50]);
        $thirdInvoice = factory(Invoice::class)->create(['date' => '2016-10-30', 'number' => '2016-03']);
        factory(Line::class)->create(['invoice_id' => $thirdInvoice->id, 'rate' => 9000, 'time' => 75]);

        $fourthInvoice = factory(Invoice::class)->create(['date' => '2017-02-25', 'number' => '2017-01']);
        factory(Line::class)->create(['invoice_id' => $fourthInvoice->id, 'rate' => 9000, 'time' => 50]);
        $fifthInvoice = factory(Invoice::class)->create(['date' => '2017-07-14', 'number' => '2017-02']);
        factory(Line::class)->create(['invoice_id' => $fifthInvoice->id, 'rate' => 9000, 'time' => 25]);
        $sixthInvoice = factory(Invoice::class)->create(['date' => '2017-10-23', 'number' => '2017-03']);
        factory(Line::class)->create(['invoice_id' => $sixthInvoice->id, 'rate' => 9000, 'time' => 100]);

        $this->assertEquals(['2017' => 157.5, '2016' => 202.5], Invoice::totalsByYear());
    }

    /** @test */
    function invoices_can_rank_their_customers_by_amount()
    {
        $firstCustomer = factory(Customer::class)->create();
        $secondCustomer = factory(Customer::class)->create();
        $thirdCustomer = factory(Customer::class)->create();

        $firstInvoice = factory(Invoice::class)->create(['customer_id' => $firstCustomer->id]);
        factory(Line::class)->create(['invoice_id' => $firstInvoice->id, 'rate' => 9000, 'time' => 25]);
        factory(Line::class)->create(['invoice_id' => $firstInvoice->id, 'rate' => 9000, 'time' => 75]);
        $secondInvoice = factory(Invoice::class)->create(['customer_id' => $secondCustomer->id]);
        factory(Line::class)->create(['invoice_id' => $secondInvoice->id, 'rate' => 9000, 'time' => 25]);
        factory(Line::class)->create(['invoice_id' => $secondInvoice->id, 'rate' => 9000, 'time' => 25]);
        $thirdInvoice = factory(Invoice::class)->create(['customer_id' => $thirdCustomer->id]);
        factory(Line::class)->create(['invoice_id' => $thirdInvoice->id, 'rate' => 9000, 'time' => 75]);

        $this->assertEquals([$firstCustomer->id => 90.0, $thirdCustomer->id => 67.50, $secondCustomer->id => 45.00], Invoice::rankedCustomers());
    }
}
