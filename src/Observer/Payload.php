<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Observer;

/**
 * @template T
 */
interface Payload
{
    /** @psalm-return T */
    public function getLoad();
}
