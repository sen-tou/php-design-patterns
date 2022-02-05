<?php

namespace Stvbyr\PhpDesignPatterns\Observer;

interface Observer
{
    public function onNotification(?Payload $payload): void;
}
