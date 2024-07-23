<?php

namespace Tools;

use Iterator;

class CsvFileIterator implements Iterator
{
    protected $file;
    protected $key = 0;
    protected $current;

    public function __construct($file)
    {
        $this->file = fopen($file, 'r');
    }

    public function __destruct()
    {
        fclose($this->file);
    }

    public function rewind(): void
    {
        rewind($this->file);
        $this->current = fgetcsv($this->file);
        $this->key = 0;
    }

    public function valid():bool
    {
        return !feof($this->file);
    }

    public function key(): mixed
    {
        return $this->key;
    }

    public function current(): mixed
    {
        return $this->current;
    }

    public function next():void
    {
        $this->current = fgetcsv($this->file);
        $this->key++;
    }
}
