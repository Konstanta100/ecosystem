<?php

declare(strict_types=1);

namespace Ecosystem\Validator;

use Ecosystem\Dto\AppParameters;
use Ecosystem\Dto\ValidationResult;

/**
 * Class AppParametersValidator
 * @package Ecosystem\Validator
 */
class AppParametersValidator
{
    public const SIZE_MIN = 2;
    public const SIZE_MAX = 10;
    public const STEP_COUNT_MAX = 100;
    public const STEP_COUNT_MIN = 1;

    /**
     * @param AppParameters $appParameters
     * @return ValidationResult
     */
    public function validate(AppParameters $appParameters): ValidationResult
    {
        if ($appParameters->getSizeSide() > self::SIZE_MAX) {
            return new ValidationResult(false, 'Размер поля больше допустимого значения: ' . self::SIZE_MAX);
        }

        if ($appParameters->getSizeSide() < self::SIZE_MIN) {
            return new ValidationResult(false, 'Размер поля меньше допустимого значения: ' . self::SIZE_MIN);
        }

        if ($appParameters->getStepsCount() > self::STEP_COUNT_MAX) {
            return new ValidationResult(false, 'Количество ходов больше допустимого значения: ' . self::STEP_COUNT_MAX);
        }

        if ($appParameters->getStepsCount() < self::STEP_COUNT_MIN) {
            return new ValidationResult(false, 'Количество ходов меньше допустимого значения: ' . self::STEP_COUNT_MIN);
        }

        return new ValidationResult(true);
    }
}
