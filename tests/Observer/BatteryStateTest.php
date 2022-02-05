<?php

namespace Stvbyr\PhpDesignPatterns\Test\Observer;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Observer\BatteryState;

class BatteryStateTest extends TestCase
{
    public function testBatteryStateCanBeCreatedWithCorrentCharge()
    {
        $battery = new BatteryState(50);

        $this->assertSame(50, $battery->getLoad());
    }
}
