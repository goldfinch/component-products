<?php

namespace Goldfinch\Component\Products\Mills;

use Goldfinch\Mill\Mill;

class ProductItemMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->sentence(5),
            'Content' => $this->faker->paragraph(10),
        ];
    }
}
