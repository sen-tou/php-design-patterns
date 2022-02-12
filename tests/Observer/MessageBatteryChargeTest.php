<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Test\Observer;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Observer\BatteryState;
use Stvbyr\PhpDesignPatterns\Observer\LogBatteryCharge;

class MessageBatteryChargeTest extends TestCase
{
    public const CHARGE = 6;

    public function testBatteryStateCanBeCreatedWithCorrentCharge(): void
    {
        /** @var BatteryState|MockObject */
        $batteryStateMock = $this->getMockBuilder(BatteryState::class)
            ->disableOriginalConstructor()
            ->getMock();

        $batteryStateMock->expects($this->once())
            ->method('getLoad')
            ->willReturn(self::CHARGE);

        $logBatteryChargeHandler = new LogBatteryCharge();
        $logBatteryChargeHandler->onNotification($batteryStateMock);

        $this->expectOutputString('The charge of the battery is '.self::CHARGE);
    }
}
