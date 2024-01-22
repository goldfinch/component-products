<?php

namespace Goldfinch\Component\Products\Pages\Nest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use Goldfinch\Component\Products\Controllers\Nest\ProductsController;

class Products extends Nest
{
    use HarvestTrait;

    private static $table_name = 'Products';

    private static $controller_name = ProductsController::class;

    private static $icon_class = 'font-icon-block-accordion';

    public function harvest(Harvest $harvest): void
    {
        // ..
    }

    public function harvestSettings(Harvest $harvest): void
    {
        // ..
    }
}
