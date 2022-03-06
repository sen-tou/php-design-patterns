<?php

namespace Stvbyr\PhpDesignPatterns\Decorator;

interface Price
{
    public function value(): float;

    public function currency(): Currency;
}
