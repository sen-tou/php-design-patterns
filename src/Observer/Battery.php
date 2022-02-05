<?php

namespace Stvbyr\PhpDesignPatterns\Observer;

use RuntimeException;

class Battery implements Observable
{
    private int $charge;

    /** @var Observer[] */
    private array $observers = [];

    public function __construct(int $charge = 100)
    {
        $this->validate($charge);

        $this->charge = $charge;
    }

    public function setCharge(int $newCharge): void
    {
        $this->validate($newCharge);

        $this->charge = $newCharge;
        $this->notify();
    }

    public function getCharge(): int
    {
        return $this->charge;
    }

    public function add(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->onNotification(new BatteryState($this->charge));
        }
    }

    private function validate(int $newCharge): void
    {
        if ($newCharge > 100 || $newCharge < 0) {
            throw new RuntimeException('Battery can only have charge from 0% to 100%');
        }
    }
}
