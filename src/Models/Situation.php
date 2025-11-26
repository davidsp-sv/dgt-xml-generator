<?php

namespace DazzaDev\DgtXmlGenerator\Models;

class Situation extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
