<?php

namespace Stvbyr\PhpDesignPatterns\Test\Strategy;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Strategy\NoReminder;

class NoReminderTest extends TestCase
{
    public function testReturnsNoNotifications(): void
    {
        $reminder = new NoReminder();

        $handledNotifications = $reminder->getHandledNotifications();

        $this->assertEquals([], $handledNotifications);
    }
}
