<?php

declare(strict_types=1);

namespace Ecosystem\Dto;


class Coordinate
{
    /**
     * @var int
     */
    private $xcor;

    /**
     * @var int
     */
    private $ycor;

    /**
     * Coordinate constructor.
     * @param int $xcor
     * @param int $ycor
     */
    public function __construct(int $xcor, int $ycor)
    {
        $this->xcor = $xcor;
        $this->ycor = $ycor;
    }


    /**
     * @return int
     */
    public function getXcor(): int
    {
        return $this->xcor;
    }

    /**
     * @return int
     */
    public function getYcor(): int
    {
        return $this->ycor;
    }

}