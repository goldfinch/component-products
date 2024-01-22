<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Services\Templater;
use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-products:templates')]
class ProductsTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:templates';

    protected $description = 'Publish [goldfinch/component-products] templates';

    protected function execute($input, $output): int
    {
        $templater = Templater::create($input, $output, $this, 'goldfinch/component-products');

        $theme = $templater->defineTheme();

        if (is_string($theme)) {

            $componentPath = BASE_PATH . '/vendor/goldfinch/component-products/templates/Goldfinch/Component/Products/';
            $themePath = 'themes/' . $theme . '/templates/Goldfinch/Component/Products/';

            $files = [
                [
                    'from' => $componentPath . 'Blocks/ProductsBlock.ss',
                    'to' => $themePath . 'Blocks/ProductsBlock.ss',
                ],
                [
                    'from' => $componentPath . 'Models/Nest/ProductItem.ss',
                    'to' => $themePath . 'Models/Nest/ProductItem.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/Products.ss',
                    'to' => $themePath . 'Pages/Nest/Products.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}
