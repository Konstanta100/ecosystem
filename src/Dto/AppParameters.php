<?php


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
     * Размер поля
     *
     * @var int
     */
    private $size;

    /**
     * Кол-во шагов
     *
     * @var int
     */
    private $steps_count;

    /**
     * AppParameters constructor.
     * @param int $size
     * @param int $steps_count
     */
    public function __construct(int $size, int $steps_count)
    {
        $this->size = $size;
        $this->steps_count = $steps_count;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function getStepsCount(): int
    {
        return $this->steps_count;
    }
}
