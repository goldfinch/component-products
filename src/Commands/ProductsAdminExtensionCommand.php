<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-products:ext:admin')]
class ProductsAdminExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:ext:admin';

    protected $description = 'Create ProductsAdmin extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/productsadmin-extension.stub';

    protected $prefix = 'Extension';
}
