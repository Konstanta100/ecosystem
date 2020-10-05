<?php

declare(strict_types=1);

namespace Ecosystem\Factory;

use Ecosystem\Entity\Creature;
use Ecosystem\Entity\Plant;


class PlantFactory implements CreatureFactory
{

    /**
     * @return Creature
     */
    public function createCreature(): Creature
    {
        return new Plant();
    }
}