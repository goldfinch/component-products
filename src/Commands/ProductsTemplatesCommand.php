<?php

namespace Goldfinch\Component\Products\Commands;

use Goldfinch\Taz\Services\Templater;
use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-products:templates')]
class ProductsTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:templates';

    protected $description = 'Publish [goldfinch/component-products] templates';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $templater = Templater::create($input, $output, $this, 'goldfinch/component-products');

        $theme = $templater->defineTheme();

        if (is_string($theme)) {

            $componentPathTemplates = BASE_PATH . '/vendor/goldfinch/component-products/templates/';
            $componentPath = $componentPathTemplates . 'Goldfinch/Component/Products/';
            $themeTemplates = 'themes/' . $theme . '/templates/';
            $themePath = $themeTemplates . 'Goldfinch/Component/Products/';

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
                    'from' => $componentPath . 'Models/Nest/ProductCategory.ss',
                    'to' => $themePath . 'Models/Nest/ProductCategory.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/Products.ss',
                    'to' => $themePath . 'Pages/Nest/Products.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/ProductsByCategory.ss',
                    'to' => $themePath . 'Pages/Nest/ProductsByCategory.ss',
                ],
                [
                    'from' => $componentPath . 'Partials/ProductFilter.ss',
                    'to' => $themePath . 'Partials/ProductFilter.ss',
                ],
                [
                    'from' => $componentPathTemplates . 'Loadable/Goldfinch/Component/Products/Models/Nest/ProductCategory.ss',
                    'to' => $themeTemplates . 'Loadable/Goldfinch/Component/Products/Models/Nest/ProductCategory.ss',
                ],
                [
                    'from' => $componentPathTemplates . 'Loadable/Goldfinch/Component/Products/Models/Nest/ProductItem.ss',
                    'to' => $themeTemplates . 'Loadable/Goldfinch/Component/Products/Models/Nest/ProductItem.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}
