<?php

namespace Goldfinch\Component\Products\Pages\Nest;

use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Component\Products\Models\Nest\ProductItem;
use Goldfinch\Component\Products\Models\Nest\ProductCategory;
use Goldfinch\Component\Products\Pages\Nest\ProductsByCategory;
use Goldfinch\Component\Products\Controllers\Nest\ProductsController;

class Products extends Nest
{
    use Millable;

    private static $table_name = 'Products';

    private static $controller_name = ProductsController::class;

    private static $allowed_children = [ProductsByCategory::class];

    private static $icon_class = 'font-icon-block-accordion';

    private static $defaults = [
        'NestedObject' => ProductItem::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields()->initFielder($this);

        $fielder = $fields->getFielder();

        // ..

        $this->extend('updateCMSFields', $fields);

        return $fields;
    }

    public function getSettingsFields()
    {
        $fields = parent::getSettingsFields()->initFielder($this);

        $fielder = $fields->getFielder();

        $fielder->disable(['NestedObject', 'NestedPseudo']);

        $this->extend('updateSettingsFields', $fields);

        return $fields;
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->NestedObject = ProductItem::class;
        $this->NestedPseudo = 0;
    }

    public function Categories()
    {
        return ProductCategory::get();
    }
}
