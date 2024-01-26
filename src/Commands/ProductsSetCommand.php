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
        $command = $this->getApplication()->find(
            'vendor:component-products:ext:admin',
        );
        $input = new ArrayInput(['name' => 'ProductsAdmin']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-products:ext:config',
        );
        $input = new ArrayInput(['name' => 'ProductConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-products:ext:block',
        );
        $input = new ArrayInput(['name' => 'ProductsBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-products:ext:page',
        );
        $input = new ArrayInput(['name' => 'Products']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-products:ext:controller',
        );
        $input = new ArrayInput(['name' => 'ProductsController']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-products:ext:item',
        );
        $input = new ArrayInput(['name' => 'ProductItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-products:ext:category',
        );
        $input = new ArrayInput(['name' => 'ProductCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-products:config');
        $input = new ArrayInput(['name' => 'component-products']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-products:templates',
        );
        $input = new ArrayInput([]);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
