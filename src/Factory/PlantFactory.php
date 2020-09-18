<?php


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