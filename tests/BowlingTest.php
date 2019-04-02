<?php

namespace App;

use PHPUnit\Framework\TestCase;

class BowlingTest extends TestCase
{
    public function test_2_gutters_score_0()
    {
        $game=new Bowling();
        $game->pin(0);
        $game->pin(0);
        $this->assertSame(0,$game->total());

    }
}
