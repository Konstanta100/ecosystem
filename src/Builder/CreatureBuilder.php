<?php

declare(strict_types=1);

namespace Ecosystem\Builder;

use Ecosystem\Entity\Creature;
use Ecosystem\Factory\CreatureFactory;

/**
 * Class CreatureBuilder
 * @package Builder
 */
class CreatureBuilder
{
    /**
     * @var CreatureFactory
     */
    private $factory;

    /**
     * CreatureBuilder constructor.
     * @param CreatureFactory $factory
     */
    public function __construct(CreatureFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param int $amount
     * @return Creature[]
     */
    public function build(int $amount): array
    {
        $creatureList = [];
        for ($i = 0; $i <= $amount; $i++) {
            $creatureList[] = $this->factory->createCreature();
        }
        return $creatureList;
    }
}
