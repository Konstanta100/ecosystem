<?php

declare(strict_types=1);

namespace Ecosystem;

use Ecosystem\Dto\AppParameters;
use Ecosystem\Service\CounterCreatureService;
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
     * @var WriterInterface
     */
    private $writer;

    /**
     * @var CounterCreatureService
     */

    private  $counterCreature;

    /**
     * Application constructor.
     * @param BoardFactory $boardFactory
     * @param WriterInterface $writer
     * @param CounterCreatureService $counterCreature
     */
    public function __construct(BoardFactory $boardFactory, WriterInterface $writer, CounterCreatureService $counterCreature)
    {
        $this->boardFactory = $boardFactory;
        $this->writer = $writer;
        $this->counterCreature = $counterCreature;
    }

    public static function createDefault(WriterInterface $writer): self
    {
        $boardFactory = new BoardFactory(new CreatureCreationService());
        $counterCreature = new CounterCreatureService();

        return new self($boardFactory, $writer, $counterCreature);
    }

    /**
     * @param AppParameters $appParameters
     * @return void
     */
    public function run(AppParameters $appParameters): void
    {
        $board = $this->boardFactory->create($appParameters);
        echo $this->counterCreature->calculateCountHerbivores($board->getListCell());
//        for ($i = $appParameters->getStepsCount(); $i > 0; $i--) {
              //$counter_creature =  $board->calculateCountCreatureInBoard();
              //if($counter_creature->getCountHerbivores())
//            if ($board->getCountHerbivores() > 0) {
//                $board->migrateCreatures($board);
//            } else {
//                $this->writer->writeMessageHerbivoresAreOver();
//                return;
//            }
//        }
       // $this->writer->writeMessageStepEnd();
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