<?php

namespace Stvbyr\PhpDesignPatterns\Observer;

class LogBatteryCharge implements Observer
{
    private function log(int $charge): void
    {
        // implement logging logic eg. using a logger to log the charge
        echo sprintf('The charge of the battery is %s', $charge);
    }

    public function onNotification(?Payload $payload): void
    {
        if ($payload) {
            $this->log($payload->getLoad());
        }
    }
}
