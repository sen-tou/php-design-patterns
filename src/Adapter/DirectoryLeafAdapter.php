<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Adapter;

class DirectoryLeafAdapter implements Leaf
{
    public function __construct(private Directory $directory)
    {
    }

    public function getTitle(): string
    {
        return $this->directory->getBasename();
    }

    public function getType(): string
    {
        return 'directory';
    }
}
