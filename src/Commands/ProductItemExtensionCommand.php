<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-products:ext:item')]
class ProductItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:ext:item';

    protected $description = 'Create ProductItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/productitem-extension.stub';

    protected $prefix = 'Extension';
}
