<?php

namespace Goldfinch\Component\Products\Blocks;

use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Helpers\Traits\BaseElementTrait;
use Goldfinch\Component\Products\Models\Nest\ProductItem;
use Goldfinch\Component\Products\Models\Nest\ProductCategory;

class ProductsBlock extends BaseElement
{
    use BaseElementTrait;

    private static $table_name = 'ProductsBlock';
    private static $singular_name = 'Products';
    private static $plural_name = 'Products';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = 'Products block handler';
    private static $icon = 'font-icon-block-accordion';

    public function Items()
    {
        return ProductItem::get();
    }

    public function Categories()
    {
        return ProductCategory::get();
    }
}
