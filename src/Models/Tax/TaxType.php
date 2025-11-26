<?php

namespace DazzaDev\DgtXmlGenerator\Models\Tax;

use DazzaDev\DgtXmlGenerator\Models\BaseModel;

class TaxType extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
