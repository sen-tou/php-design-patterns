<?php

namespace Stvbyr\PhpDesignPatterns\Decorator;

class ToUsdDecorator implements Price
{
    private const EXCHANGE_RATE = 1.1;

    public function __construct(private Price $price)
    {
    }

    public function value(): float
    {
        $exchanged = $this->price->value() * self::EXCHANGE_RATE;

        return round($exchanged, 2);
    }

    public function currency(): Currency
    {
        return Currency::USD;
    }
}
