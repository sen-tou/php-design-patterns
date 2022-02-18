<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Adapter;

interface Leaf
{
    public function getTitle(): string;

    public function getType(): string;
}
