<?php

namespace Stvbyr\PhpDesignPatterns\Test\Strategy;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Strategy\AllReminder;
use Stvbyr\PhpDesignPatterns\Strategy\Notification;
use Stvbyr\PhpDesignPatterns\Strategy\Type;

class AllReminderTest extends TestCase
{
    public function testReturnsAllNotificationsUnchanged(): void
    {
        $notifications = [
            new Notification('This is critical.', new Type(Type::EMERGENCY)),
            new Notification('This is not.', new Type(Type::INFORMATION)),
            new Notification('But this is.', new Type(Type::BREAKING)),
        ];
        $reminder = new AllReminder($notifications);

        $handledNotifications = $reminder->getHandledNotifications();

        $this->assertEquals($notifications, $handledNotifications);
    }
}
