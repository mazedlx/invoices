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
        $line = Line::factory()->make(['rate' => 120, 'time' => '100']);

        $this->assertSame(12000, $line->amount);
    }

    /** @test */
    public function a_line_can_retrieve_its_amount_in_euros()
    {
        $line = Line::factory()->make(['rate' => 12000, 'time' => '100']);

        $this->assertSame('120,00', $line->amountInEuros);
    }

    /** @test */
    public function a_line_can_retrieve_its_time_in_hours()
    {
        $line = Line::factory()->make(['time' => '147']);

        $this->assertSame('1,47', $line->timeInHours);
    }
}
