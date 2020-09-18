<?php

declare(strict_types=1);

namespace Ecosystem\Writer;


interface WriterInterface
{
    public function writeError(string $error): void;

    public function writeResult(string $result): void;

    public function writeMessageHerbivoresAreOver():void;

    public function writeMessageStepEnd(): void;

}
