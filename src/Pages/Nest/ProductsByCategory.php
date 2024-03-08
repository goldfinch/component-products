<?php

namespace Goldfinch\Component\Products\Pages\Nest;

use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Component\Products\Models\Nest\ProductCategory;
use Goldfinch\Component\Products\Controllers\Nest\ProductsByCategoryController;

class ProductsByCategory extends Nest
{
    use Millable;

    private static $table_name = 'ProductsByCategory';

    private static $controller_name = ProductsByCategoryController::class;

    private static $allowed_children = [];

    private static $icon_class = 'font-icon-block-accordion';

    private static $can_be_root = false;

    private static $description = 'Nested pseudo page, to display individual categories. Can only be added within Products page as a child page';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fielder = $this->intFielder($fields)->getFielder();

        $fielder->remove([
            'Content',
            'MenuTitle',
        ]);

        $fielder->description('Title', 'Does not show up anywhere except SiteTree in the CMS');

        return $fields;
    }

    public function getSettingsFields()
    {
        $fields = parent::getSettingsFields();

        $fielder = $this->intFielder($fields)->getFielder();

        if ($this->NestedPseudo) {
            $fielder->removeFieldsInTab('Root.Search');
            $fielder->removeFieldsInTab('Root.General');
            $fielder->removeFieldsInTab('Root.SEO');
        }

        $fielder->disable(['NestedObject']); // NestedPseudo

        return $fields;
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
