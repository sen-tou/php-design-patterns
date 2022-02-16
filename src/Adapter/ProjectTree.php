<?php

declare(strict_types=1);

namespace Stvbyr\PhpDesignPatterns\Adapter;

class ProjectTree
{
    /** @var Leaf[] */
    private array $leafs = [];

    public function addLeaf(Leaf $leaf): void
    {
        $this->leafs[] = $leaf;
    }

    public function displayTree(): void
    {
        $this->sortTree();
        foreach ($this->leafs as $leaf) {
            echo "<{$leaf->getType()}> {$leaf->getTitle()}".PHP_EOL;
        }
    }

    public function sortTree(): void
    {
        usort($this->leafs, function (Leaf $a, Leaf $b) {
            if ($a->getType() === $b->getType()) {
                return $a->getTitle() <=> $b->getTitle();
            }

            return $a->getType() <=> $b->getType();
        });
    }
}
