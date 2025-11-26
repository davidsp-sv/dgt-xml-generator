<?php

namespace DazzaDev\DgtXmlGenerator\Models\Payment;

use DazzaDev\DgtXmlGenerator\Models\BaseModel;

class PaymentMethod extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
