<?php

declare(strict_types=1);

namespace Ecosystem\Entity;

use Ecosystem\Dto\Cell;

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
                $coordinate = $this->createKeyCoordinate($x, $y);
                $this->list_cell[$coordinate] = new Cell($x, $y);
            }
        }
    }

    /**
     * Перебор всех клеток на поле и запуск
     * логики взаимодейтсвия между существами в клетке
     * @return void
     */
    public function migrateCreatures(): void
    {
        $current_list_cell = $this->list_cell;
        foreach ($current_list_cell as $cell_key => $cell) {

        }
    }

    /**
     * @param Cell $cell
     * @return void
     */
    private function changeCell(Cell $cell): void
    {
        $x = $cell->getCoordinate()->getXcor();
        $y = $cell->getCoordinate()->getYcor();
        $coordinate = $this->createKeyCoordinate($x, $y);
        $this->list_cell[$coordinate] = $cell;
    }

    /**
     * @return Cell
     */
    private function getRandomCell(): Cell
    {
        $key_coordinate = array_rand($this->getListCell());
        return ($this->getListCell()[$key_coordinate]);
    }

    /**
     * @param int $x
     * @param int $y
     * @return string
     */
    private function createKeyCoordinate(int $x, int $y): string
    {
        return $x . '_' . $y;
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
     * @return array
     */
    public function getListCell(): array
    {
        return $this->list_cell;
    }
}
