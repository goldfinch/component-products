<?php

namespace Goldfinch\Component\Products\Admin;

use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use Goldfinch\Component\Products\Blocks\ProductsBlock;
use Goldfinch\Component\Products\Configs\ProductConfig;
use Goldfinch\Component\Products\Models\Nest\ProductItem;
use Goldfinch\Component\Products\Models\Nest\ProductCategory;

class ProductsAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'products';
    private static $menu_title = 'Products';
    private static $menu_icon_class = 'font-icon-block-accordion';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        ProductItem::class => [
            'title' => 'Products',
        ],
        ProductCategory::class => [
            'title' => 'Categories',
        ],
        ProductsBlock::class => [
            'title' => 'Blocks',
        ],
        ProductConfig::class => [
            'title' => 'Settings',
        ],
    ];
}
