<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-products:config')]
class ProductsConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:config';

    protected $description = 'Create Products YML config';

    protected $path = 'app/_config';

    protected $type = 'config';

    protected $stub = './stubs/config.stub';

    protected $extension = '.yml';
}
