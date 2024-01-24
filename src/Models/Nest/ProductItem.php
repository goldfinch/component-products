<?php

namespace Goldfinch\Component\Products\Models\Nest;

use Goldfinch\Fielder\Fielder;
use SilverStripe\Assets\Image;
use SilverStripe\Control\Director;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Products\Admin\ProductsAdmin;
use Goldfinch\Component\Products\Pages\Nest\Products;
use Goldfinch\Component\Products\Configs\ProductConfig;

class ProductItem extends NestedObject
{
    use FielderTrait;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = Products::class;
    public static $nest_down_parents = [];

    private static $table_name = 'ProductItem';
    private static $singular_name = 'product';
    private static $plural_name = 'products';

    private static $db = [
        'Content' => 'HTMLText',
    ];

    private static $many_many = [
        'Categories' => ProductCategory::class,
    ];

    private static $many_many_extraFields = [
        'Categories' => [
            'SortExtra' => 'Int',
        ],
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = ['Image', 'Categories'];

    private static $summary_fields = [
        'Image.CMSThumbnail' => 'Image',
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->html('Content'),
                $fielder->tag('Categories'),
                ...$fielder->media('Image'),
            ],
        ]);

        $fielder->dataField('Image')->setFolderName('products');

        $cfg = ProductConfig::current_config();

        if ($cfg->DisabledCategories) {
            $fielder->remove('Categories');
        }
    }

    public function getNextItem()
    {
        return ProductItem::get()
            ->filter(['SortOrder:LessThan' => $this->SortOrder])
            ->Sort('SortOrder DESC')
            ->first();
    }

    public function getPreviousItem()
    {
        return ProductItem::get()
            ->filter(['SortOrder:GreaterThan' => $this->SortOrder])
            ->first();
    }

    public function getOtherItems()
    {
        return ProductItem::get()
            ->filter('ID:not', $this->ID)
            ->limit(6);
    }

    public function CMSEditLink()
    {
        $admin = new ProductsAdmin();
        return Director::absoluteBaseURL() .
            '/' .
            $admin->getCMSEditLinkForManagedDataObject($this);
    }
}
