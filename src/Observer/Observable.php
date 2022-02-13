<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Observer;

interface Observable
{
    public function register(Observer $observer): void;

    public function notify(): void;
}
