<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Adapter;

class SymLink implements Leaf
{
    private string $type = 'sym-link';

    public function __construct(private string $title)
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
