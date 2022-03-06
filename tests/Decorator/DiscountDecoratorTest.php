<?php

namespace Stvbyr\PhpDesignPatterns\Test\Decorator;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Decorator\DiscountDecorator;
use Stvbyr\PhpDesignPatterns\Decorator\Eur;

class DiscountDecoratorTest extends TestCase
{
    public function testCanGiveVariousDiscounts()
    {
        $price = new Eur(1000);

        $discount50 = new DiscountDecorator($price, 50);
        $discount20 = new DiscountDecorator($price, 20);
        $discount10 = new DiscountDecorator($price, 10);
        $discount0 = new DiscountDecorator($price, 0);
        $discountDiscounted = new DiscountDecorator($discount50, 50);

        $this->assertEquals(500, $discount50->value());
        $this->assertEquals(800, $discount20->value());
        $this->assertEquals(900, $discount10->value());
        $this->assertEquals(1000, $discount0->value());
        $this->assertEquals(250, $discountDiscounted->value());
    }

    public function testProvidesFreeProductIf100OrAbovePercentDiscount()
    {
        $price = new Eur(1000);

        $discount100 = new DiscountDecorator($price, 100);
        $discount200 = new DiscountDecorator($price, 200);

        $this->assertEquals(0, $discount100->value());
        $this->assertEquals(0, $discount200->value());
    }

    public function testIgnoresDiscountLowerThanZeroPercemt()
    {
        $price1 = new Eur(1000);
        $price2 = new Eur(2365);

        $discount1 = new DiscountDecorator($price1, -20);
        $discount2 = new DiscountDecorator($price2, -20);

        $this->assertEquals(1000, $discount1->value());
        $this->assertEquals(2365, $discount2->value());
    }
}
