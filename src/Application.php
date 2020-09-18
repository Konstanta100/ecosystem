<?php

declare(strict_types=1);

namespace Ecosystem;

use Ecosystem\Dto\AppParameters;
use Ecosystem\Factory\BoardFactory;
use Ecosystem\Writer\WriterInterface;
use Ecosystem\Service\CreatureCreationService;

class Application
{
    /**
     * @var BoardFactory
     */
    private $boardFactory;

    /**
     * Application constructor.
     * @param BoardFactory $boardFactory
     */
    public function __construct(BoardFactory $boardFactory)
    {
        $this->boardFactory = $boardFactory;
    }

    public static function createDefault(): self
    {
        $boardFactory = new BoardFactory(new CreatureCreationService());

        return new self($boardFactory);
    }

    /**
     * @param AppParameters $appParameters
     * @param WriterInterface $writer
     * @return void
     */
    public function run(AppParameters $appParameters, WriterInterface $writer): void
    {
        $board = $this->boardFactory->create($appParameters);
        var_dump($board);
//
//        for ($i = $appParameters->getStepsCount(); $i > 0; $i--) {
//            if ($board->getCountHerbivorus() > 0) {
//                $board->migrateCreatures($board);
//            } else {
//                $writer->writeMessageHerbivoresAreOver();
//                return;
//            }
//        }
//        $writer->writeMessageStepEnd();
    }

    /**
     * @return string
     */
    private function getMessageInitApp(): string
    {
        return 'Произошло создание новой экосистемы размером: ' . $this->getSizeSide() . 'x' . $this->getSizeSide() . PHP_EOL .
            'Длительность игры: ' . $this->getCountStep() . ' ходa(ов)' . PHP_EOL .
            'Растения: ' . $this->getCountPlant() . PHP_EOL .
            'Травоядные: ' . $this->getCountHerbivorous() . PHP_EOL .
            'Хищники: ' . $this->getCountPredator() . PHP_EOL .
            'Крупные хищники: ' . $this->getCountGiant() . PHP_EOL .
            'Наблюдатели: ' . $this->getCountObserver() . PHP_EOL;
    }
}