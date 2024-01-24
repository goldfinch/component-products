<?php

namespace Goldfinch\Component\Products\Pages\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Products\Controllers\Nest\ProductsController;

class Products extends Nest
{
    use FielderTrait;

    private static $table_name = 'Products';

    private static $controller_name = ProductsController::class;

    private static $icon_class = 'font-icon-block-accordion';

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function fielderSettings(Fielder $fielder): void
    {
        // ..
    }
}
