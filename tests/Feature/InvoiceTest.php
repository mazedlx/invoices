<?php

namespace Tests\Feature;

use App\Customer;
use App\Invoice;
use App\Line;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function guests_cannot_view_invoices()
    {
        $response = $this->get(route('invoices.index'));

        $response->assertRedirect(route('login'));
    }

    #[Test]
    public function users_can_view_invoices()
    {
        $response = $this->actingAs(User::factory()->create())
            ->get(route('invoices.index'));

        $response->assertOk();
    }

    #[Test]
    public function user_can_create_invoices()
    {
        Livewire::actingAs(User::factory()->create())->test('invoices.create')->set([
            'invoice.address' => 'Larastreet 1',
            'invoice.city' => 'Laraville',
            'invoice.country' => 'USA',
            'invoice.date' => '2020-03-01',
            'invoice.number' => '2020-01',
            'invoice.paid' => false,
            'invoice.zip' => '12345',
            'invoice.customer_id' => Customer::factory()->create()->id,
            'lines' => [
                [
                    'rate' => 95.00,
                    'time' => 1.5,
                    'task' => 'work',
                ],
                [
                    'rate' => 64.00,
                    'time' => 2.5,
                    'task' => 'stuff',
                ],
            ],
        ])->call('save');

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

        tap(Line::find(1), function ($line) {
            $this->assertSame(95.0, $line->rate);
            $this->assertSame(1.50, $line->time);
            $this->assertSame('work', $line->task);
        });

        tap(Line::find(2), function ($line) {
            $this->assertSame(64.00, $line->rate);
            $this->assertSame(2.50, $line->time);
            $this->assertSame('stuff', $line->task);
        });
    }

    #[Test]
    public function users_can_update_invoices()
    {
        $invoice = Invoice::factory()->has(
            Line::factory()->count(2)
        )->create();

        Livewire::actingAs(User::factory()->create())->test('invoices.edit', ['invoice' => $invoice])->set([
            'invoice.address' => 'Larastreet 1',
            'invoice.city' => 'Laraville',
            'invoice.country' => 'USA',
            'invoice.date' => '2020-03-01',
            'invoice.number' => '2020-01',
            'invoice.paid' => false,
            'invoice.zip' => '12345',
            'invoice.customer_id' => Customer::factory()->create()->id,
            'lines' => [
                [
                    'rate' => 95.00,
                    'time' => 1.5,
                    'task' => 'work',
                ],
                [
                    'rate' => 64.00,
                    'time' => 2.5,
                    'task' => 'stuff',
                ],
            ],
        ])->call('update');

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

        tap(Line::find(3), function ($line) {
            $this->assertSame(95.0, $line->rate);
            $this->assertSame(1.50, $line->time);
            $this->assertSame('work', $line->task);
        });

        tap(Line::find(4), function ($line) {
            $this->assertSame(64.00, $line->rate);
            $this->assertSame(2.50, $line->time);
            $this->assertSame('stuff', $line->task);
        });
    }

    #[Test]
    public function number_is_required()
    {
        Livewire::test('invoices.create')
            ->set('invoice.number', '')
            ->call('save')
            ->assertHasErrors(['invoice.number']);

        Livewire::test('invoices.edit', ['invoice' => Invoice::factory()->create()])
            ->set('invoice.number', '')
            ->call('update')
            ->assertHasErrors(['invoice.number']);
    }

    #[Test]
    public function address_is_required()
    {
        Livewire::test('invoices.create')
            ->set('invoice.address', '')
            ->call('save')
            ->assertHasErrors(['invoice.address']);

        Livewire::test('invoices.edit', ['invoice' => Invoice::factory()->create()])
            ->set('invoice.address', '')
            ->call('update')
            ->assertHasErrors(['invoice.address']);
    }

    #[Test]
    public function zip_is_required()
    {
        Livewire::test('invoices.create')
            ->set('invoice.zip', '')
            ->call('save')
            ->assertHasErrors(['invoice.zip']);

        Livewire::test('invoices.edit', ['invoice' => Invoice::factory()->create()])
            ->set('invoice.zip', '')
            ->call('update')
            ->assertHasErrors(['invoice.zip']);
    }

    #[Test]
    public function city_is_required()
    {
        Livewire::test('invoices.create')
            ->set('invoice.city', '')
            ->call('save')
            ->assertHasErrors(['invoice.city']);

        Livewire::test('invoices.edit', ['invoice' => Invoice::factory()->create()])
            ->set('invoice.city', '')
            ->call('update')
            ->assertHasErrors(['invoice.city']);
    }

    #[Test]
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
}
