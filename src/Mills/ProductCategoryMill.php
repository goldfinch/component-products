<?php

namespace Goldfinch\Component\Products\Mills;

use Goldfinch\Mill\Mill;

class ProductCategoryMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->sentence(5),
        ];
    }
}
