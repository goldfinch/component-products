<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-products:ext:config')]
class ProductConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:ext:config';

    protected $description = 'Create ProductConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/productconfig-extension.stub';

    protected $prefix = 'Extension';
}
