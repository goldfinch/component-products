<?php

namespace Goldfinch\Component\Products\Pages\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Products\Models\Nest\ProductCategory;
use Goldfinch\Component\Products\Controllers\Nest\ProductsByCategoryController;

class ProductsByCategory extends Nest
{
    use FielderTrait, Millable;

    private static $table_name = 'ProductsByCategory';

    private static $controller_name = ProductsByCategoryController::class;

    private static $allowed_children = [];

    private static $icon_class = 'font-icon-block-accordion';

    private static $can_be_root = false;

    private static $description = 'Nested pseudo page, to display individual categories. Can only be added within Products page as a child page';

    public function fielder(Fielder $fielder): void
    {
        $fielder->remove([
            'Content',
            'MenuTitle',
        ]);

        $fielder->description('Title', 'Does not show up anywhere except SiteTree in the CMS');
    }

    public function fielderSettings(Fielder $fielder): void
    {
        $fielder->removeFieldsInTab('Root.Search');
        $fielder->removeFieldsInTab('Root.General');
        $fielder->removeFieldsInTab('Root.SEO');

        $fielder->disable(['NestedObject']); // NestedPseudo
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->NestedObject = ProductCategory::class;
        // $this->NestedPseudo = 1;
        $this->ShowInMenus = 0;
        $this->ShowInSearch = 0;
    }
}
