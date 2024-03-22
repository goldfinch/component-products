<?php

namespace Goldfinch\Component\Products\Models\Nest;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataList;
use SilverStripe\Control\Director;
use Goldfinch\Mill\Traits\Millable;
use SilverStripe\Control\HTTPRequest;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Component\Products\Admin\ProductsAdmin;
use Goldfinch\Component\Products\Pages\Nest\Products;
use Goldfinch\Component\Products\Configs\ProductConfig;
use Goldfinch\Component\Products\Models\Nest\ProductItem;
use Goldfinch\Component\Products\Models\Nest\ProductCategory;

class ProductItem extends NestedObject
{
    use Millable;

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
        'Categories.Count' => 'Categories',
    ];

    private static $searchable_list_fields = [
        'Title', 'Content',
    ];

    public function GridItemSummaryList()
    {
        $list = parent::GridItemSummaryList();

        $list['Image'] = $this->Image()->CMSThumbnail();

        return $list;
    }

    public function summaryFields()
    {
        $fields = parent::summaryFields();

        $cfg = ProductConfig::current_config();

        if ($cfg->DisabledCategories) {
            unset($fields['Categories.Count']);
        }

        return $fields;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields()->initFielder($this);

        $fielder = $fields->getFielder();

        $fielder->required(['Title']);

        $fielder->fields([
            'Root.Main' => [
                ...$fielder->media('Image'),
                $fielder->string('Title'),
                $fielder->html('Content'),
                $fielder->tag('Categories'),
            ],
        ]);

        $fielder->dataField('Image')->setFolderName('products');

        $cfg = ProductConfig::current_config();

        if ($cfg->DisabledCategories) {
            $fielder->remove('Categories');
        }

        $this->extend('updateCMSFields', $fields);

        return $fields;
    }

    // type : mix | inside | outside
    public function OtherItems($type = 'mix', $limit = 6)
    {
        $model = ProductItem::get()->filter(['ID:not' => $this->ID])->shuffle();

        if ($type == 'mix') {
            //
        } else if ($type == 'inside') {
            $categories = $this->Categories()->column('ID');

            if (count($categories)) {
                $model = $model->filterAny('Categories.ID', $categories);
            }
        } else if ($type == 'outside') {
            $categories = $this->Categories()->column('ID');

            if (count($categories)) {
                $model = $model->filterAny('Categories.ID:not', $categories);
            }
        }

        return $model->limit($limit);
    }

    public function CMSEditLink()
    {
        $admin = new ProductsAdmin();
        return Director::absoluteBaseURL() .
            '/' .
            $admin->getCMSEditLinkForManagedDataObject($this);
    }

    /**
     * Extend nested listExtraFilter by adding additional filter option (category)
     */
    public static function listExtraFilter(DataList $list, HTTPRequest $request): DataList
    {
        $list = parent::listExtraFilter($list, $request);

        $filter = [];

        if ($request->getVar('category'))
        {
            $filter['Categories.URLSegment'] = $request->getVar('category');
        }

        if (count($filter)) {
            $list = $list->filter($filter);
        }

        return $list;
    }

    /**
     * Extend nested loadable by adding additional filter option (category)
     */
    public static function loadable(DataList $list, HTTPRequest $request, $data, $config): DataList
    {
        $list = parent::loadable($list, $request, $data, $config);

        if ($data && !empty($data))
        {
            $filter = [];

            if (isset($data['urlparams']['category']) && $data['urlparams']['category']) {

                $filter['Categories.URLSegment'] = $data['urlparams']['category'];
            }

            if (count($filter)) {
                $list = $list->filter($filter);
            }
        }

        return $list;
    }
}
