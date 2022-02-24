<?php

namespace Stvbyr\PhpDesignPatterns\Strategy;

class Notification
{
    private string $message = '';
    private Type $type;

    public function __construct(string $message, Type $type)
    {
        $this->message = $message;
        $this->type = $type;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getType(): Type
    {
        return $this->type;
    }
}
