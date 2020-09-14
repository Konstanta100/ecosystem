<?php

declare(strict_types=1);

namespace Ecosystem;

use Ecosystem\Dto\AppParameters;
use Writer\WriterInterface;

class Application
{

    /**
     * @var int $size_side
     */
    private $size_side;

    /**
     * @var int $step_count
     */
    private $step_count;

    /**
     * @var int $count_plant
     */
    private $count_plant;

    /**
     * @var int $count_herbivorous
     */
    private $count_herbivorous;

    /**
     * @var int $count_predator
     */
    private $count_predator;

    /**
     * @var int $count_observer
     */
    private $count_observer;

    /**
     * @var int $count_giant
     */
    private $count_giant;

    /**
     * @var WriterInterface $writer
     */
    private $app_writer;

    public function __construct(AppParameters $appParameters, WriterInterface $writer)
    {
        $this->setSizeSide($appParameters->getSizeSide());
        $this->setStepCount($appParameters->getStepsCount());
        $this->setAppWriter($writer);

        $all_square = $this->calculateAllSquare($this->getSizeSide());
        $live_square = $this->calculateLiveSquare($all_square);

        $this->setCountPlant($this->calculateCountPlant($live_square));
        $this->setCountHerbivorous($this->calculateCountHerbivorous($live_square));
        $this->setCountPredator($this->calculateCountPredator($live_square));
        $this->setCountGiant($this->calculateCountGiant($live_square));
        $this->setCountObserver($this->calculateCountObserver($live_square));

        $app_writer = $this->getAppWriter();
        $message = $this->getMessageInitApp();
        $app_writer->writeResult($message);
    }

    /**
     * @return int
     */
    public function getSizeSide(): int
    {
        return $this->size_side;
    }

    /**
     * @param int $size_side
     */
    public function setSizeSide(int $size_side): void
    {
        $this->size_side = $size_side;
    }

    /**
     * @return int
     */
    public function getCountStep(): int
    {
        return $this->step_count;
    }

    /**
     * @param int $count_step
     */
    public function setStepCount(int $count_step): void
    {
        $this->step_count = $count_step;
    }

    /**
     * @return int
     */
    public function getCountPlant(): int
    {
        return $this->count_plant;
    }

    /**
     * @param int $count_plant
     */
    public function setCountPlant(int $count_plant): void
    {
        $this->count_plant = $count_plant;
    }

    /**
     * @return int
     */
    public function getCountHerbivorous(): int
    {
        return $this->count_herbivorous;
    }

    /**
     * @param int $count_herbivorous
     */
    public function setCountHerbivorous(int $count_herbivorous): void
    {
        $this->count_herbivorous = $count_herbivorous;
    }

    /**
     * @return mixed
     */
    public function getCountPredator()
    {
        return $this->count_predator;
    }

    /**
     * @param int $count_predator
     */
    public function setCountPredator(int $count_predator): void
    {
        $this->count_predator = $count_predator;
    }

    /**
     * @return mixed
     */
    public function getCountObserver()
    {
        return $this->count_observer;
    }

    /**
     * @param int $count_observer
     */
    public function setCountObserver(int $count_observer): void
    {
        $this->count_observer = $count_observer;
    }

    /**
     * @return mixed
     */
    public function getCountGiant()
    {
        return $this->count_giant;
    }

    /**
     * @param int $count_giant
     */
    public function setCountGiant(int $count_giant): void
    {
        $this->count_giant = $count_giant;
    }


    /**
     * @param int $size_side
     * @return int
     */
    public function calculateAllSquare(int $size_side): int
    {
        return $size_side ** 2;
    }

    /**
     * @param int $all_square
     * @return int
     */
    public function calculateLiveSquare(int $all_square): int
    {
        return (int)round(0.70 * $all_square);
    }

    /**
     * @param int $live_square
     * @return int
     */

    public function calculateCountPlant(int $live_square): int
    {
        return (int)round(0.40 * $live_square);
    }

    /**
     * @param int $live_square
     * @return int
     */

    public function calculateCountHerbivorous(int $live_square): int
    {
        return (int)round(0.30 * $live_square);
    }

    /**
     * @param int $live_square
     * @return int
     */

    public function calculateCountPredator(int $live_square): int
    {
        return (int)round(0.15 * $live_square);
    }

    /**
     * @param int $live_square
     * @return int
     */

    public function calculateCountGiant(int $live_square): int
    {
        return (int)round(0.05 * $live_square);
    }

    /**
     * @param int $live_square
     * @return int
     */

    public function calculateCountObserver(int $live_square): int
    {
        return (int)round(0.10 * $live_square);
    }


    public function run(): void
    {
        return;
    }

    /**
     * @return string
     */

    private function getMessageInitApp(): string
    {
        return 'Произошло создание новой экосистемы размером: ' . $this->getSizeSide() . 'x' . $this->getSizeSide() . PHP_EOL .
            'Длительность игры: ' . $this->getCountStep() . ' ходa(ов)' . PHP_EOL .
            'Растения: ' . $this->getCountPlant() . PHP_EOL .
            'Травоядные: ' . $this->getCountHerbivorous() . PHP_EOL .
            'Хищники: ' . $this->getCountPredator() . PHP_EOL .
            'Крупные хищники: ' . $this->getCountGiant() . PHP_EOL .
            'Наблюдатели: ' . $this->getCountObserver() . PHP_EOL;
    }

    /**
     * @param WriterInterface $writer
     */

    private function setAppWriter(WriterInterface $writer): void
    {
        $this->app_writer = $writer;
    }

    /**
     * @return WriterInterface
     */

    private function getAppWriter(): WriterInterface
    {
        return $this->app_writer;
    }

}