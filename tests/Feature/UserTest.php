<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guests_cant_view_invoices()
    {
        $this->get('/invoices')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    /** @test */
    function users_can_view_invoices()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->get('/invoices')
            ->assertStatus(200);
    }
}
