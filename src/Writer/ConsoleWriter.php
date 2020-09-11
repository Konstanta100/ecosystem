<?php


namespace Writer;


class ConsoleWriter implements WriterInterface
{
    public function writeError(string $error): void
    {
        print '[ERROR] ' . $error;
    }

}