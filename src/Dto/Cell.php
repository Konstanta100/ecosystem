<?php

namespace Ecosystem\Dto;


use Ecosystem\Entity\Creature;

class Cell
{
    /**
     * @var Coordinate
     */
    private $coordinate;

    /**
     * @var array
     */
    private $list_creature = [];

    public function __construct(int $xcor, int $ycor)
    {
        $this->coordinate = new Coordinate($xcor, $ycor);
    }

    /**
     * @return Coordinate
     */
    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }

    /**
     * @param Creature $creature
     * @return void
     */
    public function putCreature(Creature $creature): void
    {
        $creature->setCoordinate($this->getCoordinate());
        $this->list_creature[] = $creature;
    }


    /**
     * @return array
     */
    public function getListCreature() :array
    {
        return $this->list_creature;
    }
}