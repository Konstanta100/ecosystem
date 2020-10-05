<?php

declare(strict_types=1);

namespace Ecosystem\Service;

use Ecosystem\Dto\Cell;
use Ecosystem\Entity\Herbivores;
use Ecosystem\Entity\Plant;

class CounterCreatureService
{

    /**
     * @param array $getListCell
     * @return int
     */
    public function calculateCountPlant(array $getListCell): int
    {
        $count_plant = 0;
        foreach ($getListCell as $cell) {
            $count_plant += $this->getCountPlantInCell($cell);
        }

        return $count_plant;
    }

    /**
     * @param Cell $cell
     * @return int
     */

    private function getCountPlantInCell(Cell $cell): int
    {
        $count_plant_in_cell = 0;
        foreach ($cell->getListCreature() as $creature) {
            if ($creature instanceof Plant) {
                $count_plant_in_cell++;
            }
        }
        return $count_plant_in_cell;
    }

    /**
     * @param array $getListCell
     * @return int
     */
    public function calculateCountHerbivores(array $getListCell): int
    {
        $count_herbivore = 0;
        foreach ($getListCell as $cell) {
            $count_herbivore += $this->getCountHerbivoresInCell($cell);
        }

        return $count_herbivore;
    }

    /**
     * @param Cell $cell
     * @return int
     */

    private function getCountHerbivoresInCell(Cell $cell): int
    {
        $count_herbivore_in_cell = 0;
        foreach ($cell->getListCreature() as $creature) {
            if ($creature instanceof Herbivores) {
                $count_herbivore_in_cell++;
            }
        }
        return $count_herbivore_in_cell;
    }
}