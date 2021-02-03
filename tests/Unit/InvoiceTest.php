<?php

namespace Tests\Unit;

use App\Company;
use App\Customer;
use App\Invoice;
use App\Line;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function invoices_have_a_recipient()
    {
        $invoice = Invoice::factory()->for(Customer::factory())->for(Company::factory())->create();

        $recipient = $invoice->recipient;

        $this->assertSame(
            implode('<br>', [
                $invoice->company->name,
                $invoice->customer->name,
                $invoice->address,
                $invoice->zip . ' ' . $invoice->city,
            ]),
            $recipient
        );
    }

    /** @test */
    public function invoices_can_generate_an_invoice_number()
    {
        Invoice::factory()->create(['date' => '2017-02-01']);
        Invoice::factory()->create(['date' => '2017-05-03']);
        Invoice::factory()->create(['date' => '2017-06-07']);

        $this->assertSame('2017-04', Invoice::generateNumber('2017-08-09 00:00:00'));
    }

    /** @test */
    public function invoices_can_calculate_their_amount()
    {
        $invoice = Invoice::factory()
            ->has(Line::factory(['rate' => 90.00, 'time' => 1.00]))
            ->has(Line::factory(['rate' => 90.00, 'time' => .50]))
            ->has(Line::factory(['rate' => 90.00, 'time' => .75]))
            ->create();

        $this->assertSame('202,50', $invoice->amountInEuros);
    }
}
