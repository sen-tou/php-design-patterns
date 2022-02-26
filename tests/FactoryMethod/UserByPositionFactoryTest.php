<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Test\FactoryMethod;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\FactoryMethod\BoardMember;
use Stvbyr\PhpDesignPatterns\FactoryMethod\Employee;
use Stvbyr\PhpDesignPatterns\FactoryMethod\Guest;
use Stvbyr\PhpDesignPatterns\FactoryMethod\Lead;
use Stvbyr\PhpDesignPatterns\FactoryMethod\Options;
use Stvbyr\PhpDesignPatterns\FactoryMethod\UserByPositionFactory;

class UserByPositionFactoryTest extends TestCase
{
    public function testCanCreateBoardMember(): void
    {
        $userByPositionFactory = new UserByPositionFactory();

        $options = new Options();
        $options->name = 'Bob';
        $options->positions = ['board-member', 'employee'];
        $boardMember = $userByPositionFactory->createUser($options);

        $this->assertInstanceOf(BoardMember::class, $boardMember);
    }

    public function testCanCreateLead(): void
    {
        $userByPositionFactory = new UserByPositionFactory();

        $options = new Options();
        $options->name = 'Bob';
        $options->positions = ['lead', 'employee'];
        $lead = $userByPositionFactory->createUser($options);

        $this->assertInstanceOf(Lead::class, $lead);
    }

    public function testCanCreateEmployee(): void
    {
        $userByPositionFactory = new UserByPositionFactory();

        $options = new Options();
        $options->name = 'Bob';
        $options->positions = ['scrum-master', 'employee'];
        $employee = $userByPositionFactory->createUser($options);

        $this->assertInstanceOf(Employee::class, $employee);
    }

    public function testCanCreateGuest(): void
    {
        $userByPositionFactory = new UserByPositionFactory();

        $options = new Options();
        $options->name = 'Bob';
        $options->positions = ['customer', 'investor'];
        $guest = $userByPositionFactory->createUser($options);

        $this->assertInstanceOf(Guest::class, $guest);
    }
}
