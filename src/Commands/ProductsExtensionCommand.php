<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-products:ext:page')]
class ProductsExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:ext:page';

    protected $description = 'Create Products page extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/products-extension.stub';

    protected $suffix = 'Extension';
}
