<?php

namespace Tests\Unit;

use Sukohi\Wafu\Facades\Wafu;
use Tests\TestCase;

class WafuTest extends TestCase
{
    public function test_can_get_japanese_era_info()
    {
        $era = Wafu::era(1977);

        $this->assertEquals('昭和', $era['name']);
        $this->assertEquals(52, $era['year']);
        $this->assertEquals('S', $era['initial']);
        $this->assertEquals('showa', $era['symbol']);
        $this->assertEquals('昭和52年', $era['full']);
    }

    public function test_can_get_proper_prefecture_count()
    {
        $prefectures = Wafu::prefectures();

        $this->assertCount(47, $prefectures);
    }

    public function test_can_confirm_different_consumption_tax_rate()
    {
        $dt = now();
        $amount = 1000;
        $total_flag = true;

        $tax_1 = Wafu::consumptionTax($dt, $amount, $total_flag, true);
        $tax_2 = Wafu::consumptionTax($dt, $amount, $total_flag, false);

        $this->assertNotEquals($tax_1, $tax_2);
    }
}
