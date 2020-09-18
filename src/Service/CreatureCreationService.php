<?php


namespace Ecosystem\Service;

use Ecosystem\Builder\CreatureBuilder;
use Ecosystem\Entity\Creature;
use Ecosystem\Factory\PlantFactory;
use Ecosystem\Factory\HerbivoresFactory;

/**
 * Class CreatureDistributionCalculator
 * @package Service
 */
class CreatureCreationService
{
    /**
     * @param int $horizontal_size_side
     * @param int $vertical_size_side
     * @return array
     */
    public function create(int $horizontal_size_side, int $vertical_size_side): array
    {
        $square = $horizontal_size_side * $vertical_size_side;
        $liveSquare = round($square * 0.80);

        $creaturesList[] = $this->calculatePlantAmount($liveSquare);
        $creaturesList[] = $this->calculateHerbivoreAmount($liveSquare);

        return array_merge(...$creaturesList);
    }

    /**
     * @param int $liveSquare
     * @return Creature[]
     */
    private function calculatePlantAmount(int $liveSquare): array
    {
        $amount = round($liveSquare * 0.35);

        return (new CreatureBuilder(new PlantFactory()))->build($amount);
    }

    /**
     * @param int $liveSquare
     * @return Creature[]
     */
    private function calculateHerbivoreAmount(int $liveSquare): array
    {
        $amount = round($liveSquare * 0.35);

        return (new CreatureBuilder(new HerbivoresFactory()))->build($amount);
    }
}
