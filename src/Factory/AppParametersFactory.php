<?php

declare(strict_types=1);

namespace Ecosystem\Factory;

use Ecosystem\Dto\AppParameters;

/**
 * Фабрика для создания параметров приложения
 *
 * Class AppParametersFactory
 */
class AppParametersFactory
{

    public function create(array $parameters): AppParameters
    {
        $size = (int)($parameters[1] ?? 0);
        $stepsCount = (int)($parameters[2] ?? 0);

        return new AppParameters($size, $size, $stepsCount);
    }
}
