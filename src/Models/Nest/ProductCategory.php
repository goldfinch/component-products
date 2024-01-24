<?php

namespace Goldfinch\Component\Products\Models\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Products\Pages\Nest\ProductsByCategory;

class ProductCategory extends NestedObject
{
    use FielderTrait;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = ProductsByCategory::class;
    public static $nest_down_parents = [];

    private static $table_name = 'ProductCategory';
    private static $singular_name = 'category';
    private static $plural_name = 'categories';

    private static $db = [];

    private static $belongs_many_many = [
        'Items' => ProductItem::class,
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->fields([
            'Root.Main' => [$fielder->string('Title')],
        ]);
    }
}
