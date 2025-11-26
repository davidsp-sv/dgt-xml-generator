<?php

namespace DazzaDev\DgtXmlGenerator\Models\LineItem;

use DazzaDev\DgtXmlGenerator\Models\BaseModel;

class PharmaceuticalForm extends BaseModel
{
    /**
     * Get Pharmaceutical Form Array
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
