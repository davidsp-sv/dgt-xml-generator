<?php

namespace DazzaDev\DgtXmlGenerator\Models;

class SaleCondition extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
