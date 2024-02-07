<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-products:ext:controller')]
class ProductsControllerExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:ext:controller';

    protected $description = 'Create ProductsController extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/productscontroller-extension.stub';

    protected $prefix = 'Extension';
}
