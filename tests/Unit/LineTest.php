<?php

namespace Tests\Unit;

use App\Line;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_line_can_calculate_its_amount()
    {
        $line = Line::factory()->make(['rate' => 1.2, 'time' => '100']);

        $this->assertSame(120.0, $line->amount);
    }

    /** @test */
    public function a_line_can_retrieve_its_amount_in_euros()
    {
        $line = Line::factory()->make(['rate' => 1.20, 'time' => '100']);

        $this->assertSame('120,00', $line->amountInEuros);
    }

    /** @test */
    public function a_line_can_retrieve_its_time_in_hours()
    {
        $line = Line::factory()->make(['time' => 1.47]);

        $this->assertSame('1,47', $line->timeInHours);
    }
}
