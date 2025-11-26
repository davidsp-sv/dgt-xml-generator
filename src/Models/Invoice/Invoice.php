<?php

namespace DazzaDev\DgtXmlGenerator\Models\Invoice;

use DazzaDev\DgtXmlGenerator\Models\Document;

class Invoice extends Document
{
    /**
     * Invoice constructor
     */
    public function __construct(array $data = [])
    {
        // Set document type
        $this->setDocumentType('01');

        // Initialize invoice data
        if (empty($data)) {
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
