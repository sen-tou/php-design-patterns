<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use Stvbyr\PhpDesignPatterns\Observer\Battery;
use Stvbyr\PhpDesignPatterns\Observer\LogBatteryCharge;
use Stvbyr\PhpDesignPatterns\Observer\MessageBatteryCharge;

$battery = new Battery(50);
$battery->register(new LogBatteryCharge());
$battery->register(new MessageBatteryCharge());

// whenever the charge changes, the observers are triggered
$battery->setCharge(100);
$battery->setCharge(15);
