<?php

namespace Stvbyr\PhpDesignPatterns\Test\Strategy;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Strategy\CriticalReminder;
use Stvbyr\PhpDesignPatterns\Strategy\Notification;
use Stvbyr\PhpDesignPatterns\Strategy\Type;

class CriticalReminderTest extends TestCase
{
    public function testOnlyEchosCriticalNotifications(): void
    {
        $notifications = [
            new Notification('This is critical.', new Type(Type::EMERGENCY)),
            new Notification('This is not.', new Type(Type::INFORMATION)),
            new Notification('But this is.', new Type(Type::BREAKING)),
        ];
        $reminder = new CriticalReminder($notifications);

        ob_start();
        $reminder->sendNotifications();
        $output = ob_get_clean();

        $this->assertEquals('This is critical.'.PHP_EOL.'But this is.'.PHP_EOL, $output);
    }
}
