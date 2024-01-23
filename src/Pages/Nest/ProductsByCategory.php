<?php

namespace Goldfinch\Component\Products\Pages\Nest;

use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Component\Products\Controllers\Nest\ProductsByCategoryController;

class ProductsByCategory extends Nest
{
    private static $table_name = 'Products';

    private static $controller_name = ProductsByCategoryController::class;

    private static $icon_class = 'font-icon-block-accordion';

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->ShowInMenus = 0;
        $this->ShowInSearch = 0;
    }
}
