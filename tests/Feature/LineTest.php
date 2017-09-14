<?php

namespace Tests\Feature;

use App\Invoice;
use App\Line;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_line_can_be_added_to_an_invoice()
    {
        $invoice = factory(Invoice::class)->create();
        $line = factory(Line::class)->make(['invoice_id' => $invoice->id]);

        $this->post('/lines', $line->toArray());

        $this->assertDatabaseHas('lines', ['invoice_id' => $invoice->id]);
    }
}
