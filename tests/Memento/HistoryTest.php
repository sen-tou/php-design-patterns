<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Test\Memento;

use PHPUnit\Framework\TestCase;
use Stvbyr\PhpDesignPatterns\Memento\History;
use Stvbyr\PhpDesignPatterns\Memento\StateInterface;

class BatteryStateTest extends TestCase
{
    public function testCanGetLatestEntry(): void
    {
        $history = new History();

        $entry = $this->createMock(StateInterface::class);
        $entry2 = $this->createMock(StateInterface::class);

        $history->push($entry);
        $history->push($entry2);

        $latestEntry = $history->getPrevious(); // this will remote entry2 completely

        $this->assertSame($entry, $latestEntry);
    }

    public function testHistoryThrowsErrorIfThereIsNoPreviousState(): void
    {
        try {
            $history = new History();

            $history->getPrevious();
        } catch (\Exception $e) {
            $this->assertSame('There is no previous state', $e->getMessage());
        }
    }
}
