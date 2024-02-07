<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-products')]
class ProductsSetCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products';

    protected $description = 'Set of all [goldfinch/component-products] commands';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find('vendor:component-products:ext:admin');
        $command->run(new ArrayInput(['name' => 'ProductsAdmin']), $output);

        $command = $this->getApplication()->find('vendor:component-products:ext:config');
        $command->run(new ArrayInput(['name' => 'ProductConfig']), $output);

        $command = $this->getApplication()->find('vendor:component-products:ext:block');
        $command->run(new ArrayInput(['name' => 'ProductsBlock']), $output);

        $command = $this->getApplication()->find('vendor:component-products:ext:page');
        $command->run(new ArrayInput(['name' => 'Products']), $output);

        $command = $this->getApplication()->find('vendor:component-products:ext:controller');
        $command->run(new ArrayInput(['name' => 'ProductsController']), $output);

        $command = $this->getApplication()->find('vendor:component-products:ext:item');
        $command->run(new ArrayInput(['name' => 'ProductItem']), $output);

        $command = $this->getApplication()->find('vendor:component-products:ext:category');
        $command->run(new ArrayInput(['name' => 'ProductCategory']), $output);

        $command = $this->getApplication()->find('vendor:component-products:config');
        $command->run(new ArrayInput(['name' => 'component-products']), $output);

        $command = $this->getApplication()->find('vendor:component-products:templates');
        $command->run(new ArrayInput([]), $output);

        return Command::SUCCESS;
    }
}
