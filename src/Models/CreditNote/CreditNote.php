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
        // Document type for Credit Note
        $this->setDocumentType('03');

        // Initialize credit note data
        if (! empty($data)) {
            parent::__construct($data);
            // $this->setReferencedDocument($data['referenced_document']);
        }
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            // 'referenced_document' => $this->getReferencedDocument()->toArray(),
        ]);
    }
}
