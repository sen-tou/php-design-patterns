<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use Stvbyr\PhpDesignPatterns\Strategy\AllReminder;
use Stvbyr\PhpDesignPatterns\Strategy\CriticalReminder;
use Stvbyr\PhpDesignPatterns\Strategy\NoReminder;
use Stvbyr\PhpDesignPatterns\Strategy\Notification;
use Stvbyr\PhpDesignPatterns\Strategy\ReminderService;
use Stvbyr\PhpDesignPatterns\Strategy\Type;

$notifications = [
    new Notification('Just an info...', new Type(Type::INFORMATION)),
    new Notification('PLEASE CALL THE POLICE WE HAVE AN EMERGENCY', new Type(Type::EMERGENCY)),
    new Notification('It is ... broken!', new Type(Type::BREAKING)),
    new Notification('I am a really important news element. CLICKBAIT TITLE', new Type(Type::NEWS)),
];

echo "--- User 1 \n";

$reminderService1 = new ReminderService(new NoReminder());
$reminderService1->sendNotifications();
echo PHP_EOL;

echo "--- User 2 \n";

$reminderService2 = new ReminderService(new AllReminder($notifications));
$reminderService2->sendNotifications();
echo PHP_EOL;

echo "--- User 2 \n";

$reminderService3 = new ReminderService(new CriticalReminder($notifications));
$reminderService3->sendNotifications();
echo PHP_EOL;
