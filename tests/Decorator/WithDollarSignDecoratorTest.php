<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Test\Decorator;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Decorator\Eur;
use Stvbyr\PhpDesignPatterns\Decorator\ToUsdDecorator;
use Stvbyr\PhpDesignPatterns\Decorator\WithDollarSignDecorator;
use Stvbyr\PhpDesignPatterns\Decorator\WrongCurrencyException;

class WithDollarSignDecoratorTest extends TestCase
{
    public function testCanConvert1000EurToUsd(): void
    {
        $price = new Eur(1000);
        $toUsd = new ToUsdDecorator($price);

        $withDollarSign = new WithDollarSignDecorator($toUsd);

        $this->assertEquals('$1,100.00', $withDollarSign->format());
    }

    public function testThrowsExceptionIfNotUsd(): void
    {
        $price = new Eur(1000);

        $this->expectException(WrongCurrencyException::class);

        new WithDollarSignDecorator($price);
    }
}
