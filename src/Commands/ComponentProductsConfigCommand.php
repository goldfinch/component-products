<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'config:component-products')]
class ComponentProductsConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'config:component-products';

    protected $description = 'Create component-products config';

    protected $path = 'app/_config';

    protected $type = 'component-products yml config';

    protected $stub = 'productconfig.stub';

    protected $extension = '.yml';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
