<?php

namespace DazzaDev\DgtXmlGenerator\Models\Discount;

use DazzaDev\DgtXmlGenerator\Models\BaseModel;

class DiscountType extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
