<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Adapter;

class Directory
{
    public function __construct(private string $path)
    {
    }

    public function getBasename(): string
    {
        return basename($this->path);
    }
}
