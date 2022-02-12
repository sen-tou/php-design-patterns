<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Test\Observer;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Observer\Battery;

class BatteryTest extends TestCase
{
    public function testBatteryCanBeCreatedWithCorrentCharge(): void
    {
        $battery = new Battery(50);
        $battery2 = new Battery(100);

        $this->assertSame(50, $battery->getCharge());
        $this->assertSame(100, $battery2->getCharge());
    }

    public function testBatteryChargeCanBeUpdate(): void
    {
        $battery = new Battery(50);
        $battery->setCharge(60);

        $this->assertSame(60, $battery->getCharge());
    }

    public function testBatteryChargeJustBetweenZeroAndOneHundredAllowed(): void
    {
        try {
            new Battery(-1);

            $this->fail('Should not be bellow 0.');
        } catch (\Exception $e) {
            $this->assertSame('Battery can only have charge from 0% to 100%', $e->getMessage());
        }

        try {
            new Battery(101);

            $this->fail('Should not be above 100.');
        } catch (\Exception $e) {
            $this->assertSame('Battery can only have charge from 0% to 100%', $e->getMessage());
        }

        try {
            $battery = new Battery(2);
            $battery->setCharge(-100);

            $this->fail('Should not be set wrongly after creation.');
        } catch (\Exception $e) {
            $this->assertSame('Battery can only have charge from 0% to 100%', $e->getMessage());
        }
    }
}
