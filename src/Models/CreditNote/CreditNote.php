<?php

namespace DazzaDev\DgtXmlGenerator\Models\CreditNote;

use DazzaDev\DgtXmlGenerator\Models\Document;

class CreditNote extends Document
{
    /**
     * CreditNote constructor
     */
    public function __construct(array $data = [])
    {
        $this->setDocumentType('03');

        if (! empty($data)) {
            parent::__construct($data);
        }
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return parent::toArray();
    }
}
