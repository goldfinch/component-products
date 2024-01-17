<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-products-productitem')]
class ProductItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products-productitem';

    protected $description = 'Create ProductItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-products item extension';

    protected $stub = 'productitem-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
