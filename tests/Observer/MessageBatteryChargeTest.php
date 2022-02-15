<?php

namespace Stvbyr\PhpDesignPatterns\Test\Observer;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Observer\BatteryState;
use Stvbyr\PhpDesignPatterns\Observer\MessageBatteryCharge;

class MessageBatteryChargeTest extends TestCase
{
    public const CHARGE_BELOW_20 = 6;
    public const CHARGE_ABOVE_20 = 69;
    private $batteryStateMock;

    public function testIfBatteryChargeIsLowerThan20PercentThanShowAReminderToChargeIt(): void
    {
        $this->batteryStateMock->expects($this->once())
            ->method('getLoad')
            ->willReturn(self::CHARGE_BELOW_20);

        $messageBatteryChargeHandler = new MessageBatteryCharge();
        $messageBatteryChargeHandler->onNotification($this->batteryStateMock);

        $this->expectOutputString('Please charge the battery. Charge is '.self::CHARGE_BELOW_20."\n");
    }

    public function testIfBatteryChargeIsAbove20PercentThanShowABatteryOkMessage(): void
    {
        $this->batteryStateMock->expects($this->once())
            ->method('getLoad')
            ->willReturn(self::CHARGE_ABOVE_20);

        $messageBatteryChargeHandler = new MessageBatteryCharge();
        $messageBatteryChargeHandler->onNotification($this->batteryStateMock);

        $this->expectOutputString('Battery is ok');
    }

    public function setUp(): void
    {
        $this->batteryStateMock = $this->getMockBuilder(BatteryState::class)
            ->disableOriginalConstructor()
            ->getMock();
    }
}
