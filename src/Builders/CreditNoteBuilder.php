<?php

namespace DazzaDev\DgtXmlGenerator\Builders;

use DazzaDev\DgtXmlGenerator\Models\CreditNote\CreditNote;
use LogicException;

class CreditNoteBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance
     */
    protected function createDocument(): CreditNote
    {
        return new CreditNote($this->documentData);
    }

    /**
     * Get document type for credit note
     */
    protected function getDocumentType(): string
    {
        return 'credit-note';
    }

    /**
     * Get the credit note instance
     */
    public function getCreditNote(): CreditNote
    {
        if (! $this->document instanceof CreditNote) {
            throw new LogicException('Expected CreditNote document.');
        }

        return $this->document;
    }
}
