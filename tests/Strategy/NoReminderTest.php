<?php

namespace Stvbyr\PhpDesignPatterns\Test\Strategy;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Strategy\NoReminder;

class NoReminderTest extends TestCase
{
    public function testEchosNothing(): void
    {
        $reminder = new NoReminder();

        ob_start();
        $reminder->sendNotifications();
        $output = ob_get_clean();

        $this->assertEquals('', $output);
    }
}
