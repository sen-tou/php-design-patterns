<?php

namespace Stvbyr\PhpDesignPatterns\Decorator;

class DiscountDecorator implements Price
{
    public function __construct(
        private Price $price,
        private int $discountPercent
    ) {
    }

    public function value(): float
    {
        if ($this->discountPercent >= 100) {
            return 0;
        }

        if ($this->discountPercent < 0) {
            return $this->price->value();
        }

        $multiplier = 1 - ($this->discountPercent / 100);

        return $this->price->value() * $multiplier;
    }

    public function currency(): Currency
    {
        return $this->price->currency();
    }
}
