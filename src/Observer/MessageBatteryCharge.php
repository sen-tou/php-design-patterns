<?php

namespace Stvbyr\PhpDesignPatterns\Observer;

class MessageBatteryCharge
{
    private function log(int $charge): void
    {
        // implement messaging logic eg. using a message queue to send the curretn charge
        if ($charge < 20) {
            echo sprintf('Please charge the battery. Charge is %s', $charge);
        }
    }

    public function onNotification(?Payload $payload): void
    {
        if ($payload) {
            $this->log($payload->getLoad());
        }
    }
}
