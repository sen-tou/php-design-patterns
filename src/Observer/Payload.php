<?php

namespace Stvbyr\PhpDesignPatterns\Observer;

/**
 * @template T
 */
interface Payload
{
    /** @psalm-return T */
    public function getLoad();
}
