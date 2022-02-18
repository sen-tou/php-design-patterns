<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\FactoryMethod;

class UserByPositionFactory implements UserFactory
{
    public function createUser(Options $options): AbstractUser
    {
        return match (true) {
            in_array('board-member', $options->positions) => new BoardMember($options->name, $options->positions),
            !array_diff($options->positions, ['employee', 'lead']) => new Lead($options->name, $options->positions),
            in_array('employee', $options->positions) => new Employee($options->name, $options->positions),
            default => new Guest($options->name, $options->positions),
        };
    }
}
