<?php

namespace Goldfinch\Component\Products\Models\Nest;

use Goldfinch\Mill\Traits\Millable;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\Controller;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Component\Products\Configs\ProductConfig;
use Goldfinch\Component\Products\Pages\Nest\ProductsByCategory;

class ProductCategory extends NestedObject
{
    use Millable;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = ProductsByCategory::class;
    public static $nest_down_parents = [];

    private static $table_name = 'ProductCategory';
    private static $singular_name = 'category';
    private static $plural_name = 'categories';

    private static $db = [
        'Content' => 'HTMLText',
    ];

    private static $belongs_many_many = [
        'Items' => ProductItem::class,
    ];

    private static $summary_fields = [
        'Items.Count' => 'Products',
    ];

    private static $searchable_list_fields = [
        'Title', 'Content',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fielder = $this->intFielder($fields)->getFielder();

        $fielder->required(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->html('Content'),
            ],
        ]);

        return $fields;
    }

    public function List()
    {
        if (Controller::has_curr()) {
            $ctrl = Controller::curr();

            $cfg = ProductConfig::current_config();

            return PaginatedList::create($this->Items(), $ctrl->getRequest())->setPageLength($cfg->ItemsPerPage ?? 10);
        }
    }

    public function OtherCategories($type = 'mix', $limit = 6, $escapeEmpty = true)
    {
        $filter = ['ID:not' => $this->ID];

        if ($escapeEmpty) {
            $filter['Items.Count():GreaterThan'] = 0;
        }

        return ProductCategory::get()->filter($filter)->shuffle()->limit($limit);
    }
}
