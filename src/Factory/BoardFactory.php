<?php


namespace Ecosystem\Factory;


use Ecosystem\Dto\AppParameters;
use Ecosystem\Entity\Board;
use Ecosystem\Service\CreatureCreationService;

class BoardFactory
{
    /**
     * @var CreatureCreationService
     */
    private $creatureCreationService;

    /**
     * BoardFactory constructor.
     * @param CreatureCreationService $creatureCreationService
     */
    public function __construct(CreatureCreationService $creatureCreationService)
    {
        $this->creatureCreationService = $creatureCreationService;
    }

    public function create(AppParameters $appParameters) : Board
    {
        $creatureList = $this->creatureCreationService->create($appParameters->getHorizontalSize(), $appParameters->getVerticalSize());
        $board = new Board($appParameters->getHorizontalSize(), $appParameters->getVerticalSize());
        foreach ($creatureList as $creature) {
            $board->putCreatureInRandomCell($creature);
        }

        return $board;
    }
}