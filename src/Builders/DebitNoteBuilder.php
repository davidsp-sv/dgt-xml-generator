<?php

namespace DazzaDev\DgtXmlGenerator\Builders;

use DazzaDev\DgtXmlGenerator\Models\DebitNote\DebitNote;
use LogicException;

class DebitNoteBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance
     */
    protected function createDocument(): DebitNote
    {
        return new DebitNote($this->documentData);
    }

    /**
     * Get document type for debit note
     */
    protected function getDocumentType(): string
    {
        return 'debit-note';
    }

    /**
     * Get the debit note instance
     */
    public function getDebitNote(): DebitNote
    {
        if (! $this->document instanceof DebitNote) {
            throw new LogicException('Expected DebitNote document.');
        }

        return $this->document;
    }
}
