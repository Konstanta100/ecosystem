<?php

declare(strict_types=1);

namespace Ecosystem;

class Application
{
    public function run(Input $input): void
    {
        if($input->verifyInput()){
            $ecosystem = new Ecosystem($input->size_side,$input->size_side);
        }

    }
}