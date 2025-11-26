<?php

namespace DazzaDev\DgtXmlGenerator\Models\ReceiverMessage;

use DazzaDev\DgtXmlGenerator\Models\BaseModel;

class MessageType extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
