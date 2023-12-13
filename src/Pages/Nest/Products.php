<?php

namespace Goldfinch\Component\Products\Pages\Nest;

use Goldfinch\Component\Products\Controllers\Nest\ProductsController;
use Goldfinch\Nest\Pages\Nest;

class Products extends Nest
{
    private static $table_name = 'Products';
    private static $controller_name = ProductsController::class;

    private static $icon_class = 'font-icon-block-accordion';
}
