<?php

namespace Stvbyr\PhpDesignPatterns\AbstractFactory;

use JsonSerializable;

interface FileExporterInterface
{
    public function export(JsonSerializable $object, string $format, string $filename);
}
