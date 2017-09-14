<?php

namespace Tests\Unit;

use App\Invoice;
use App\Line;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function an_invoice_has_a_recipient()
    {
        $invoice = factory(Invoice::class)->create();

        $recipient = $invoice->recipient;

        $this->assertEquals(
            implode('<br>', [
                $invoice->company,
                $invoice->customer,
                $invoice->zip . ' ' . $invoice->city,
                $invoice->address,
            ]), $recipient
        );
    }

    /** @test */
    function an_invoice_can_generate_an_invoice_number()
    {
        factory(Invoice::class)->create(['date' => '2017-02-01']);
        factory(Invoice::class)->create(['date' => '2017-05-03']);
        factory(Invoice::class)->create(['date' => '2017-06-07']);

        $this->assertEquals('2017-04', Invoice::generateNumber('2017-08-09 00:00:00'));
    }

    /** @test */
    function an_invoice_can_calculate_its_amount()
    {
        $invoice = factory(Invoice::class)->create();
        factory(Line::class)->create(['invoice_id' => $invoice->id, 'rate' => 9000, 'time' => 100]);
        factory(Line::class)->create(['invoice_id' => $invoice->id, 'rate' => 9000, 'time' => 50]);
        factory(Line::class)->create(['invoice_id' => $invoice->id, 'rate' => 9000, 'time' => 75]);

        $this->assertEquals('202,50', $invoice->amountInEuros);

    }
}
