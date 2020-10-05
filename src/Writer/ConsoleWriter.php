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
        print   'Произошло создание новой экосистемы' . PHP_EOL .
            "размер поля:  {$appParameters->getHorizontalSize()}x{$appParameters->getVerticalSize()}" . PHP_EOL .
            "Длительность игры: {$appParameters->getStepsCount()} ход(a/ов)" . PHP_EOL;
    }

    /**
     * @param int $count_migration
     * @return void
     */
    public function writeCountMigration(int $count_migration): void
    {
        print "Количество оставшихся миграций: $count_migration" . PHP_EOL;
    }
}