<?php

namespace Goldfinch\Component\Products\Configs;

use Goldfinch\Harvest\Harvest;
use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use Goldfinch\Harvest\Traits\HarvestTrait;
use SilverStripe\View\TemplateGlobalProvider;

class ProductConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, HarvestTrait;

    private static $table_name = 'ProductConfig';

    private static $db = [
        'DisabledCategories' => 'Boolean',
    ];

    public function harvest(Harvest $harvest): void
    {
        $harvest->fields([
            'Root.Main' => [
                $harvest->checkbox('DisabledCategories', 'Disabled categories'),
            ],
        ]);
    }
}
