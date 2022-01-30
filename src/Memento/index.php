<?php

require_once __DIR__.'/../../vendor/autoload.php';

use Stvbyr\PhpDesignPatterns\Memento\Booking;
use Stvbyr\PhpDesignPatterns\Memento\BookingState;
use Stvbyr\PhpDesignPatterns\Memento\History;

$history = new History();

$booking = new Booking(1, new DateTimeImmutable('2022-01-01'));
$history->push(new BookingState($booking));

$booking->setDate(new DateTimeImmutable('2022-01-30'));
$history->push(new BookingState($booking));

echo $booking->getDate()->format(DATE_ISO8601).PHP_EOL; // 2022-01-30T00:00:00+0100

// undo will get the previous change and also resets its internal state to that previous change
// note: we do not handle errors here; the undo method does not return a change if it has no changes tracked
// it is up to you how to treat this scenario
$booking->restore($history->undo());

echo $booking->getDate()->format(DATE_ISO8601).PHP_EOL; // 2022-01-01T00:00:00+0100
