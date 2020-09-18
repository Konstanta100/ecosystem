<?php


namespace Ecosystem\Dto;

use Ecosystem\Entity\Creature;

class Board
{
    /**
     * @var array
     */
    private $list_cell;

    /**
     * @var int
     */
    private $horizontal_size_side;

    /**
     * @var int
     */
    private $vertical_size_side;

    public function __construct(int $horizontal_size_side, int $vertical_size_side)
    {
        $this->horizontal_size_side = $horizontal_size_side;
        $this->vertical_size_side = $vertical_size_side;

        for ($y = 1; $y <= $this->getVerticalSizeSide(); $y++) {
            for ($x = 1; $x <= $this->getHorizontalSizeSide(); $x++) {
                $this->list_cell[$x][$y] = new Cell($x,$y);
            }
        }
    }

    /**
     * @return int
     */
    public function getHorizontalSizeSide(): int
    {
        return $this->horizontal_size_side;
    }

    /**
     * @return int
     */
    public function getVerticalSizeSide(): int
    {
        return $this->vertical_size_side;
    }

    /**
     * @param array $list_cell
     * @return void
     */
    public function setListCell(array $list_cell): void
    {
        $this->list_cell = $list_cell;
    }

    /**
     * @param Creature $creature
     * @return void
     */

    public function putCreatureInRandomCell(Creature $creature): void
    {
        $cell = $this->getRandomCell();
        $cell->putCreature($creature);
        $this->changeCell($cell);
    }

    /**
     * @return Cell
     */
    private function getRandomCell() : Cell
    {
        $xcor = array_rand($this->getListCell());
        $ycor = array_rand($this->getListCell()[$xcor]);
        return $this->getListCell()[$xcor][$ycor];
    }

    /**
     * @return array
     */
    public function getListCell(): array
    {
        return $this->list_cell;
    }

    /**
     * @param Cell $cell
     * @return void
     */
    private function changeCell(Cell $cell): void
    {
        $this->list_cell[$cell->getCoordinate()->];
    }
}