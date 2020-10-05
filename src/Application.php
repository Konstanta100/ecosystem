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

    private $counterCreature;

    /**
     * Application constructor.
     * @param BoardFactory $boardFactory
     * @param WriterInterface $writer
     * @param CounterCreatureService $counterCreature
     */
    public function __construct(
        BoardFactory $boardFactory,
        WriterInterface $writer,
        CounterCreatureService $counterCreature
    ) {
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
        $this->writer->writeStartGame($appParameters);
        $board = $this->boardFactory->create($appParameters);

        for ($count_migration = $appParameters->getStepsCount(); $count_migration > 0; $count_migration--) {
            $count_herbivores = $this->counterCreature->calculateCountHerbivores($board->getListCell());

            if ($count_herbivores > 0) {
                $this->writer->writeCountMigration($count_migration);
                $board->migrateCreatures();
            } else {
                $this->writer->writeHerbivoresAreOver();
                return;
            }
        }
        $this->writer->writeStepEnd();
    }
}