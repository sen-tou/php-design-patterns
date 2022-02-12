<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Test\Observer;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Observer\BatteryState;

class BatteryStateTest extends TestCase
{
    public function testBatteryStateCanBeCreatedWithCorrentCharge(): void
    {
        $battery = new BatteryState(50);

        $this->assertSame(50, $battery->getLoad());
    }
}
