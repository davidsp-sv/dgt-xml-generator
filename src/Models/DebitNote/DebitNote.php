<?php

namespace DazzaDev\DgtXmlGenerator\Models\DebitNote;

use DazzaDev\DgtXmlGenerator\Models\Document;
use DazzaDev\DgtXmlGenerator\Models\Reason;

class DebitNote extends Document
{
    /**
     * Reasons information
     *
     * @var Reason[]
     */
    private array $reasons = [];

    /**
     * DebitNote constructor
     */
    public function __construct(array $data = [])
    {
        // Document type for Debit Note
        $this->setDocumentType('02');

        // Initialize debit note data
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
            // 'referenced_document' => $this->getReferencedDocument()?->toArray(),
        ]);
    }
}
