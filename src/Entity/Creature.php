<?php

declare(strict_types=1);

namespace Ecosystem\Entity;

use Ecosystem\Dto\Coordinate;

class Creature
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Coordinate
     */
    private $coordinate;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Coordinate $coordinate
     * @return void
     */
    public function setCoordinate(Coordinate $coordinate): void
    {
        $this->coordinate = $coordinate;
    }

    /**
     * @return Coordinate
     */
    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }
}