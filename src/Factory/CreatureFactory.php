<?php

declare(strict_types=1);

namespace Ecosystem\Factory;

use Ecosystem\Entity\Creature;

interface CreatureFactory
{
    /**
     * @return Creature
     */
    public function createCreature(): Creature;
}