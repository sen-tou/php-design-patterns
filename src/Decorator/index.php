<?php

declare(strict_types=1);

use Stvbyr\PhpDesignPatterns\Decorator\DiscountDecorator;
use Stvbyr\PhpDesignPatterns\Decorator\Eur;
use Stvbyr\PhpDesignPatterns\Decorator\ToUsdDecorator;
use Stvbyr\PhpDesignPatterns\Decorator\WithDollarSignDecorator;

require_once __DIR__.'/../../vendor/autoload.php';

$priceInEur = new Eur(1000);

$toUsd = new ToUsdDecorator($priceInEur);

$discountedEur = new DiscountDecorator($priceInEur, 20);
$discountedUsd = new DiscountDecorator($toUsd, 50);

$withDoallarSign = new WithDollarSignDecorator($toUsd);

echo $discountedEur->value(); // 800
echo PHP_EOL;
echo $discountedUsd->value(); // 550
echo PHP_EOL;
echo $withDoallarSign->format(); // $1,100.00
echo PHP_EOL;
