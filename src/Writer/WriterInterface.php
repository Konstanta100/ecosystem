<?php


namespace Writer;


interface WriterInterface
{
    public function writeError(string $error): void;
}
