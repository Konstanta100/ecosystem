<?php


namespace Ecosystem\Factory;


use Ecosystem\Entity\Creature;
use Ecosystem\Entity\Herbivores;

class HerbivoresFactory implements CreatureFactory
{
    public function createCreature(): Creature
    {
        return new Herbivores();
    }
}