<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-products:ext:block')]
class ProductsBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:ext:block';

    protected $description = 'Create ProductsBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/productsblock-extension.stub';

    protected $suffix = 'Extension';
}
