<?php

declare(strict_types=1);

namespace Ecosystem;


class Input
{
    /** @var int $size_side */
    /** @var int $count_step */

    public $size_side;
    public $count_step;


    public function verifyInput(): bool
    {
        $is_valid = false;
        if ($this->size_side !== null && $this->count_step !== null) {
            $is_valid = true;
        }
        return $is_valid;
    }

    public function setSizeSide(int $size_side): void
    {
        $this->size_side = $size_side;
    }

    public function setCountStep(int $count_step): void
    {
        $this->count_step = $count_step;
    }
}