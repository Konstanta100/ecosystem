<?php

namespace Ecosystem;

use Ecosystem\Notice;


class Ecosystem
{
    /** @var int $size_side */
    /** @var int $count_step */
    /** @var int $count_plant */
    /** @var int $count_herbivorous */
    /** @var int $count_predator */
    /** @var int $count_observer */
    /** @var int $count_giant */

    public $size_side;
    public $count_step;
    public $count_plant;
    public $count_herbivorous;
    public $count_predator;
    public $count_observer;
    public $count_giant;


    public function __construct(int $size_side, int $count_step)
    {

        $square = $size_side ** 2;
        $live_square = round($square * 0.70);

        $this->size_side = $size_side;
        $this->count_step = $count_step;

        //40% - растений
        $this->count_plant = round($live_square * 0.40);
        //30% - травоядных
        $this->count_herbivorous = round($live_square * 0.30);
        //15% - хищников
        $this->count_predator = round($live_square * 0.15);
        //5% - крупных хищников
        $this->count_giant = round($live_square * 0.05);
        //10% - наблюдателей
        $this->count_observer = round($live_square * 0.10);

        $notice = new Notice();


        print('Произошло создание новой экосистемы размером: ' . self::$size_side . 'x' . self::$size_side . PHP_EOL);
        print('Длительность игры: ' . self::$count_step . ' ходa(ов)' . PHP_EOL);
        print('Растения: ' . self::$count_plant . PHP_EOL);
        print('Хищники: ' . self::$count_predator . PHP_EOL);
        print('Крупные хищники: ' . self::$count_giant . PHP_EOL);
        print('Травоядные: ' . self::$count_herbivorous . PHP_EOL);
        print('Наблюдатели: ' . self::$count_observer . PHP_EOL);
    }
}
