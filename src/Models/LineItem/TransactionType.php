<?php

namespace DazzaDev\DgtXmlGenerator\Models\LineItem;

use DazzaDev\DgtXmlGenerator\Models\BaseModel;

class TransactionType extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
