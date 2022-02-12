<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Observer;

/**
 * @implements Payload<int>
 */
class BatteryState implements Payload
{
    public function __construct(private int $charge)
    {
    }

    public function getLoad()
    {
        return $this->charge;
    }
}
