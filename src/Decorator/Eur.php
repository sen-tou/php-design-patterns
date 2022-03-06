<?php

namespace Stvbyr\PhpDesignPatterns\Decorator;

class Eur implements Price
{
    private Currency $currency = Currency::EUR;

    public function __construct(
        private float $value
    ) {
    }

    public function value(): float
    {
        return $this->value;
    }

    public function currency(): Currency
    {
        return $this->currency;
    }
}
