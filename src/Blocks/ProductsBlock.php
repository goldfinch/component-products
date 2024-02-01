<?php

namespace Goldfinch\Component\Products\Blocks;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Products\Models\Nest\ProductItem;
use Goldfinch\Component\Products\Models\Nest\ProductCategory;

class ProductsBlock extends BaseElement
{
    use FielderTrait, Millable;

    private static $table_name = 'ProductsBlock';
    private static $singular_name = 'Products';
    private static $plural_name = 'Products';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-block-accordion';

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function Items()
    {
        return ProductItem::get();
    }

    public function Categories()
    {
        return ProductCategory::get();
    }

    public function getSummary()
    {
        return $this->getDescription();
    }

    public function getType()
    {
        $default = $this->i18n_singular_name() ?: 'Block';

        return _t(__CLASS__ . '.BlockType', $default);
    }
}
