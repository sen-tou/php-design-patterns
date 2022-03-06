<?php

namespace Stvbyr\PhpDesignPatterns\Decorator;

use NumberFormatter;

class WithDollarSignDecorator implements Price
{
    public function __construct(private Price $price)
    {
        if (Currency::USD !== $price->currency()) {
            throw new WrongCurrencyException('You can only use prices with USD.');
        }
    }

    public function value(): float
    {
        return $this->price->value();
    }

    public function currency(): Currency
    {
        return $this->price->currency();
    }

    public function format(): string
    {
        return (new NumberFormatter('en_US', NumberFormatter::CURRENCY))
            ->format($this->price->value())
        ;
    }
}
