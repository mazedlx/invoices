<?php

namespace Tests\Unit;

use App\Line;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_line_can_calculate_its_amount()
    {
        $line = factory(Line::class)->create(['rate' => 120, 'time' => '100']);

        $this->assertEquals(12000, $line->amount);
    }

    /** @test */
    function a_line_can_retrieve_its_amount_in_euros()
    {
        $line = factory(Line::class)->create(['rate' => 12000, 'time' => '100']);

        $this->assertEquals('120,00', $line->amountInEuros);
    }

    /** @test */
    function a_line_can_retrieve_its_time_in_hours()
    {
        $line = factory(Line::class)->create(['time' => '147']);

        $this->assertEquals('1,47', $line->timeInHours);
    }
}
