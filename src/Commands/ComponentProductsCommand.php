<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-products')]
class ComponentProductsCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products';

    protected $description = 'Populate goldfinch/component-products components';

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-products-productitem',
        );
        $input = new ArrayInput(['name' => 'ProductItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-products-productcategory',
        );
        $input = new ArrayInput(['name' => 'ProductCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-products-productconfig',
        );
        $input = new ArrayInput(['name' => 'ProductConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-products-productsblock',
        );
        $input = new ArrayInput(['name' => 'ProductsBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'templates:component-products',
        );
        $input = new ArrayInput([]);
        $command->run($input, $output);

        $command = $this->getApplication()->find('config:component-products');
        $input = new ArrayInput(['name' => 'component-products']);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
