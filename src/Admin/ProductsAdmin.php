<?php

namespace Goldfinch\Component\Products\Admin;

use Goldfinch\Component\Products\Models\Nest\ProductItem;
use Goldfinch\Component\Products\Blocks\ProductsBlock;
use Goldfinch\Component\Products\Configs\ProductConfig;
use Goldfinch\Component\Products\Models\Nest\ProductCategory;
use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use SilverStripe\Forms\GridField\GridFieldConfig;

class ProductsAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'products';
    private static $menu_title = 'Products';
    private static $menu_icon_class = 'font-icon-block-accordion';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        ProductItem::class => [
            'title'=> 'Products',
        ],
        ProductCategory::class => [
            'title'=> 'Categories',
        ],
        ProductsBlock::class => [
            'title'=> 'Blocks',
        ],
        ProductConfig::class => [
            'title'=> 'Settings',
        ],
    ];

    // public $showImportForm = true;
    // public $showSearchForm = true;
    // private static $page_length = 30;

    public function getList()
    {
        $list = parent::getList();

        // ..

        return $list;
    }

    protected function getGridFieldConfig(): GridFieldConfig
    {
        $config = parent::getGridFieldConfig();

        // ..

        return $config;
    }

    public function getSearchContext()
    {
        $context = parent::getSearchContext();

        // ..

        return $context;
    }

    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        // ..

        return $form;
    }

    // public function getExportFields()
    // {
    //     return [
    //         // 'Name' => 'Name',
    //         // 'Category.Title' => 'Category'
    //     ];
    // }
}
