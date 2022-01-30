<?php

namespace Stvbyr\PhpDesignPatterns\Memento;

class History
{
    private array $states = [];

    public function push(StateInterface $state): void
    {
        $this->states[] = $state;
    }

    public function undo(): ?StateInterface
    {
        array_pop($this->states);

        return $this->states[array_key_last($this->states)] ?? null;
    }
}
