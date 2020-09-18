<?php

declare(strict_types=1);

namespace Ecosystem\Dto;

/**
 * Хранит в себе параметры приложения
 *
 * Class AppParameters
 * @package Dto
 */
class AppParameters
{
    /**
     * Размер поля по горизонтали
     *
     * @var int
     */
    private $horizontal_size;

    /**
     * Размер поля по вертикали
     *
     * @var int
     */
    private $vertical_size;

    /**
     * Кол-во шагов
     *
     * @var int
     */
    private $steps_count;

    /**
     * AppParameters constructor.
     * @param int $horizontal_size
     * @param int $vertical_size
     * @param int $steps_count
     */
    public function __construct(int $horizontal_size, int $vertical_size, int $steps_count)
    {
        $this->horizontal_size = $horizontal_size;
        $this->vertical_size = $vertical_size;
        $this->steps_count = $steps_count;
    }

    /**
     * @return int
     */
    public function getHorizontalSize(): int
    {
        return $this->horizontal_size;
    }

    /**
     * @return int
     */
    public function getVerticalSize(): int
    {
        return $this->vertical_size;
    }

    /**
     * @return int
     */
    public function getStepsCount(): int
    {
        return $this->steps_count;
    }
}
