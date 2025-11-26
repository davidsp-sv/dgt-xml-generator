<?php

namespace DazzaDev\DgtXmlGenerator\Models;

class DocumentType extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
