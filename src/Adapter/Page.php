<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Adapter;

class Page implements Leaf
{
    private string $type = 'page';

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
