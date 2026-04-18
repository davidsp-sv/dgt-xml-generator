<?php

namespace DazzaDev\DgtXmlGenerator\Models\DebitNote;

use DazzaDev\DgtXmlGenerator\Models\Document;

class DebitNote extends Document
{
    /**
     * DebitNote constructor
     */
    public function __construct(array $data = [])
    {
        $this->setDocumentType('02');

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
