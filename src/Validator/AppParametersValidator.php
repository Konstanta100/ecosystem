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
    public const SIZE_MIN_ = 2;
    public const SIZE_MAX = 10;

    /**
     * @param AppParameters $appParameters
     * @return ValidationResult
     */
    public function validate(AppParameters $appParameters): ValidationResult
    {
        if ($appParameters->getSize() > self::SIZE_MAX) {
            return new ValidationResult(false, 'Размер поля превышает допустимое значение: ' . self::SIZE_MAX);
        }

        if ($appParameters->getSize() < self::SIZE_MIN_) {
            return new ValidationResult(false, 'Размер поля  меньше допустимого значения: ' . self::SIZE_MAX);
        }

        return new ValidationResult(true);
    }
}
