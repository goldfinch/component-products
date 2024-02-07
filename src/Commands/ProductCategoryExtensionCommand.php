<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-products:ext:category')]
class ProductCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:ext:category';

    protected $description = 'Create ProductCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/productcategory-extension.stub';

    protected $suffix = 'Extension';
}
