<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

use Stvbyr\PhpDesignPatterns\Adapter\Directory;
use Stvbyr\PhpDesignPatterns\Adapter\DirectoryLeafAdapter;
use Stvbyr\PhpDesignPatterns\Adapter\Page;
use Stvbyr\PhpDesignPatterns\Adapter\ProjectTree;
use Stvbyr\PhpDesignPatterns\Adapter\SymLink;

$projectTree = new ProjectTree();

$projectTree->addLeaf(new Page('Home'));
$projectTree->addLeaf(new Page('About'));
$projectTree->addLeaf(new SymLink('Old About'));
$projectTree->addLeaf(new Page('Blog'));
$projectTree->addLeaf(new DirectoryLeafAdapter(
    new Directory('/resources/images')
));
$projectTree->addLeaf(new DirectoryLeafAdapter(
    new Directory('/resources/css')
));
$projectTree->addLeaf(new Page('Blog'));

$projectTree->displayTree();
