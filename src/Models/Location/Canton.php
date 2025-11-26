<?php

namespace DazzaDev\DgtXmlGenerator\Models\Location;

use DazzaDev\DgtXmlGenerator\Models\BaseModel;

class Canton extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
