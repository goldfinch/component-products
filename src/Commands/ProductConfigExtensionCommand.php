<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-products:productconfig')]
class ProductConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:productconfig';

    protected $description = 'Create ProductConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-products config extension';

    protected $stub = 'productconfig-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
