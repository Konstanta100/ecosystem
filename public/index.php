<?php

declare(strict_types=1);

namespace Ecosystem;

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Ecosystem\Factory\AppParametersFactory;
use Ecosystem\Validator\AppParametersValidator;
use Ecosystem\Writer\ConsoleWriter;

$appParametersFactory = new AppParametersFactory();
$appParameters = $appParametersFactory->create($argv);

$validator = new AppParametersValidator();
$validationResult = $validator->validate($appParameters);

$writer = new ConsoleWriter();

if ($validationResult->isValid()) {
    $application = Application::createDefault($writer);
    $application->run($appParameters);
} else {
    $writer->writeError($validationResult->getError());
}



