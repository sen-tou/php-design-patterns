<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Memento;

use ErrorException;

/**
 * @template T
 */
class History
{
    /**
     * @var StateInterface[]
     * @psalm-var T[]
     */
    private array $states = [];

    /**
     * @psalm-param T $state
     */
    public function push(StateInterface $state): void
    {
        $this->states[] = $state;
    }

    /**
     * @psalm-return T
     */
    public function getPrevious(): ?StateInterface
    {
        array_pop($this->states);

        $previousState = array_key_last($this->states);

        if (null === $previousState) {
            throw new ErrorException('There is no previous state');
        }

        return $this->states[$previousState];
    }
}
