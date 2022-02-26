<?php

namespace Stvbyr\PhpDesignPatterns\Test\Strategy;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Strategy\Notification;
use Stvbyr\PhpDesignPatterns\Strategy\Reminder;
use Stvbyr\PhpDesignPatterns\Strategy\ReminderService;
use Stvbyr\PhpDesignPatterns\Strategy\Type;

class ReminderServiceTest extends TestCase
{
    public function testEchosNotifications()
    {
        $reminder = $this->createMock(Reminder::class);
        $reminder->method('getHandledNotifications')
            ->willReturn([
                new Notification('This is critical.', new Type(Type::EMERGENCY)),
                new Notification('This is not.', new Type(Type::INFORMATION)),
                new Notification('But this is.', new Type(Type::BREAKING)),
            ]);
        $reminderService = new ReminderService($reminder);

        ob_start();
        $reminderService->sendNotifications();
        $output = ob_get_clean();

        $this->assertSame('This is critical.'.PHP_EOL.'This is not.'.PHP_EOL.'But this is.'.PHP_EOL, $output);
    }
}
