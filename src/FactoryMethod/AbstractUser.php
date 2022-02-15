<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\FactoryMethod;

abstract class AbstractUser
{
    public function __construct(
        private string $name,
        private array $positions
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPositions(): array
    {
        return $this->positions;
    }

    public function setPositions(array $positions): void
    {
        $this->positions = $positions;
    }
}
