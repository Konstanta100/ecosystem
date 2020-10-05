<?php

declare(strict_types=1);

namespace Ecosystem\Writer;

use Ecosystem\Dto\AppParameters;

interface WriterInterface
{
    public function writeError(string $error): void;

    public function writeHerbivoresAreOver(): void;

    public function writeStepEnd(): void;

    public function writeStartGame(AppParameters $appParameters): void;

    public function writeCountMigration(int $count_migration): void;

}
