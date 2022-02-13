<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Observer;

class MessageBatteryCharge implements Observer
{
    private function log(int $charge): void
    {
        // implement messaging logic eg. using a message queue to send the current charge
        if ($charge < 20) {
            echo sprintf("Please charge the battery. Charge is %s\n", $charge);
        }
    }

    public function onNotification(?Payload $payload): void
    {
        if ($payload) {
            $this->log($payload->getLoad());
        }
    }
}
