<?php

namespace Stvbyr\PhpDesignPatterns\AbstractFactory;

use JsonSerializable;

class Order implements JsonSerializable
{
    public function __construct(private string $id, private string $customer, private int $charge)
    {
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'customer' => $this->customer,
            'charge' => $this->charge,
        ];
    }
}
