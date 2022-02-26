<?php

namespace Stvbyr\PhpDesignPatterns\Strategy;

class Type
{
    public const EMERGENCY = 'Emergency';
    public const NEWS = 'News';
    public const BREAKING = 'Breaking';
    public const INFORMATION = 'Information';

    private string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function getTypeName(): string
    {
        return $this->type;
    }
}
