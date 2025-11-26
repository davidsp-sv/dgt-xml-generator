<?php

namespace DazzaDev\DgtXmlGenerator\Models\Tax;

use DazzaDev\DgtXmlGenerator\Models\BaseModel;

class IvaType extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
