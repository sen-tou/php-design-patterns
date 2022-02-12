<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Observer;

interface Observable
{
    public function add(Observer $observer): void;

    public function notify(): void;
}
