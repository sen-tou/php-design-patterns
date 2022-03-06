<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Test\Decorator;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Decorator\Eur;
use Stvbyr\PhpDesignPatterns\Decorator\ToUsdDecorator;

class ToUsdDollarDecoratorTest extends TestCase
{
    public function testCanConvert1000EurToUsd(): void
    {
        $price = new Eur(1000);

        $toUsd = new ToUsdDecorator($price);

        $this->assertEquals(1100, $toUsd->value());
    }

    public function testCanConvert1Dot99EurToUsd(): void
    {
        $price = new Eur(1.99);

        $toUsd = new ToUsdDecorator($price);

        $this->assertEquals(2.19, $toUsd->value());
    }

    public function testCanConvert1Dot94EurToUsd(): void
    {
        $price = new Eur(1.94);

        $toUsd = new ToUsdDecorator($price);

        $this->assertEquals(2.13, $toUsd->value());
    }
}
