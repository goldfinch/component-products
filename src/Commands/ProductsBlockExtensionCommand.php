<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-products:productsblock')]
class ProductsBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:productsblock';

    protected $description = 'Create ProductsBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-products block extension';

    protected $stub = 'productsblock-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
