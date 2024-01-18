<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-products:productcategory')]
class ProductCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:productcategory';

    protected $description = 'Create ProductCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-products category extension';

    protected $stub = 'productcategory-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
