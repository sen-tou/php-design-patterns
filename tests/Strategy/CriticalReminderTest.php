<?php

namespace Stvbyr\PhpDesignPatterns\Test\Strategy;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Strategy\CriticalReminder;
use Stvbyr\PhpDesignPatterns\Strategy\Notification;
use Stvbyr\PhpDesignPatterns\Strategy\Type;

class CriticalReminderTest extends TestCase
{
    public function testReturnsOnlyCriticalNotifications(): void
    {
        $notifications = [
            new Notification('This is critical.', new Type(Type::EMERGENCY)),
            new Notification('This is not.', new Type(Type::INFORMATION)),
            new Notification('But this is.', new Type(Type::BREAKING)),
        ];
        $reminder = new CriticalReminder($notifications);

        $handledNotifications = $reminder->getHandledNotifications();

        $this->assertEquals([
            new Notification('This is critical.', new Type(Type::EMERGENCY)),
            new Notification('But this is.', new Type(Type::BREAKING)),
        ], $handledNotifications);
    }
}
