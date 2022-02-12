<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Observer;

interface Observer
{
    public function onNotification(?Payload $payload): void;
}
