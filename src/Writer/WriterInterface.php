<?php


namespace Writer;


interface WriterInterface
{
    public function writeError(string $error): void;

    public function writeResult(string $result): void;
}
