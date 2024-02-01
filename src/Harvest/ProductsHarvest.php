<?php

namespace Goldfinch\Component\Products\Harvest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Blocks\Pages\Blocks;
use Goldfinch\Component\Products\Pages\Nest\Products;
use Goldfinch\Component\Products\Blocks\ProductsBlock;
use Goldfinch\Component\Products\Models\Nest\ProductItem;
use Goldfinch\Component\Products\Models\Nest\ProductCategory;
use Goldfinch\Component\Products\Pages\Nest\ProductsByCategory;

class ProductsHarvest extends Harvest
{
    public static function run(): void
    {
        $productsPage = Products::mill(1)->make([
            'Title' => 'Products',
            'Content' => '',
        ])->first();

        ProductsByCategory::mill(1)->make([
            'Title' => 'Products by category',
            'Content' => '',
            'ParentID' => $productsPage->ID,
        ]);

        ProductCategory::mill(5)->make();

        ProductItem::mill(30)->make()->each(function($item) {
            $categories = ProductCategory::get()->shuffle()->limit(rand(0,4));

            foreach ($categories as $category) {
                $item->Categories()->add($category);
            }
        });

        // add one block to Blocks demo page (if it's exists)
        if (class_exists(Blocks::class)) {
            $demoBlocks = Blocks::get()->filter('Title', 'Blocks')->first();

            if ($demoBlocks && $demoBlocks->exists() && $demoBlocks->ElementalArea()->exists()) {
                ProductsBlock::mill(1)->make([
                    'ClassName' => $demoBlocks->ClassName,
                    'TopPageID' => $demoBlocks->ID,
                    'ParentID' => $demoBlocks->ElementalArea()->ID,
                    'Title' => 'Products',
                ]);
            }
        }
    }
}
