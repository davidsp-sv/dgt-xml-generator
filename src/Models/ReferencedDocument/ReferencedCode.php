<?php

namespace DazzaDev\DgtXmlGenerator\Models\ReferencedDocument;

use DazzaDev\DgtXmlGenerator\Models\BaseModel;

class ReferencedCode extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
