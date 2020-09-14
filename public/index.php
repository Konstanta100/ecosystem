<?php

declare(strict_types=1);

namespace Ecosystem;


use Ecosystem\Factory\AppParametersFactory;
use Ecosystem\Validator\AppParametersValidator;
use Writer\ConsoleWriter;

$appParametersFactory = new AppParametersFactory();
$appParameters = $appParametersFactory->create($argv);

$validator = new AppParametersValidator();
$validationResult = $validator->validate($appParameters);

$writer = new ConsoleWriter();

if ($validationResult->isValid()) {
    $application = new Application($appParameters, $writer);
    $application->run();
} else {
    $writer->writeError($validationResult->getError());
}



