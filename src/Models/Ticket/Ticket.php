<?php

namespace DazzaDev\DgtXmlGenerator\Models\Ticket;

use DazzaDev\DgtXmlGenerator\Models\Document;

class Ticket extends Document
{
    /**
     * Ticket constructor
     */
    public function __construct(array $data = [])
    {
        // Set document type
        $this->setDocumentType('04');

        // Initialize ticket data
        if (empty($data)) {
            parent::__construct($data);
        }
    }
}
