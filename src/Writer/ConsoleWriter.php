<?php

declare(strict_types=1);

namespace Ecosystem\Writer;

class ConsoleWriter implements WriterInterface
{
    public function writeError(string $error): void
    {
        print '[ERROR] ' . $error;
    }

    public function writeResult(string $result): void
    {
        print $result;
    }

    public function  writeMessageHerbivoresAreOver(): void
    {
        print 'Конец игры. Всех травоядных съели.' . PHP_EOL;
    }

    public function writeMessageStepEnd(): void
    {
       print 'Конец игры. Ходы закончились.' . PHP_EOL;
    }

}