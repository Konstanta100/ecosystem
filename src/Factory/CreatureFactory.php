<?php


namespace Ecosystem\Factory;

use Ecosystem\Entity\Creature;


interface CreatureFactory
{
    /**
     * @return Creature
     */
    public function createCreature(): Creature;
}