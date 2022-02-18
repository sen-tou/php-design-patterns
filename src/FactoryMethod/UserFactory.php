<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\FactoryMethod;

interface UserFactory
{
    public function createUser(Options $options): AbstractUser;
}
