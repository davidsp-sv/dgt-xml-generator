<?php

namespace DazzaDev\DgtXmlGenerator\Models\Entities;

use DazzaDev\DgtXmlGenerator\Models\BaseModel;

class IdentificationType extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
