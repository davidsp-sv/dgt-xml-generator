<?php

namespace DazzaDev\DgtXmlGenerator\Models\ReceiverMessage;

use DazzaDev\DgtXmlGenerator\Models\BaseModel;

class TaxCondition extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
