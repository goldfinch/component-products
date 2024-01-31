<?php

namespace Goldfinch\Component\Products\Mills;

use Goldfinch\Mill\Mill;

class ProductsMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->sentence(3),
            'Content' => $this->faker->paragraph(20),
        ];
    }
}
