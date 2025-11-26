<?php

namespace DazzaDev\DgtXmlGenerator\Models\LineItem;

use DazzaDev\DgtXmlGenerator\Models\BaseModel;

class UnitMeasure extends BaseModel
{
    /**
     * Convert model to array
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
