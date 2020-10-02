<?php

declare(strict_types=1);

namespace Ecosystem\Writer;

use Ecosystem\Dto\AppParameters;

class ConsoleWriter implements WriterInterface
{
    /**
     * @param string $error
     */
    
    public function writeError(string $error): void
    {
        print '[ERROR] ' . $error;
    }

    /**
     * @param string $result
     */
    public function writeResult(string $result): void
    {
        print $result;
    }

    /**
     * @return void
     */
    public function writeHerbivoresAreOver(): void
    {
        print 'Конец игры. Всех травоядных съели.' . PHP_EOL;
    }

    /**
     * @return void
     */
    public function writeStepEnd(): void
    {
        print 'Конец игры. Ходы закончились.' . PHP_EOL;
    }

    /**
     * @param AppParameters $appParameters
     * @return void
     */
    public function writeStartGame(AppParameters $appParameters): void 
    {
        print   "Произошло создание новой экосистемы размером:  
                {$appParameters->getHorizontalSize()}x{$appParameters->getVerticalSize()}" . PHP_EOL .
            "Длительность игры: {$appParameters->getStepsCount()} ход(a/ов)" . PHP_EOL;
    }
}