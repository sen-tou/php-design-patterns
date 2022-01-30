<?php

namespace Stvbyr\PhpDesignPatterns\AbstractFactory;

use JsonSerializable;

class BadFileExporter
{
    private array $data;

    public function __construct(private JsonSerializable $object)
    {
        $this->convertObject();
    }

    public function export(string $filename, string $format = 'json')
    {
        switch ($format) {
            case 'csv':
                $content = $this->createCsv();
                $this->createFile($content, $filename, 'csv');
                // no break
            case 'json':
                $content = $this->createJson();
                $this->createFile($content, $filename, 'json');
        }
    }

    private function createCsv(): string
    {
        $f = fopen('php://memory', 'r+');
        foreach ($this->data as $item) {
            fputcsv($f, $item);
        }
        rewind($f);

        return stream_get_contents($f);
    }

    private function createJson(): string
    {
        return json_encode($this->data);
    }

    private function createFile(string $contents, string $filename, string $extension): int|false
    {
        return file_put_contents("{$filename}.{$extension}", $contents);
    }

    private function convertObject()
    {
        $this->objectAsArray = json_decode(json_encode($this->object), true);
    }
}
