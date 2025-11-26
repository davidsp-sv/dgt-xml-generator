<?php

namespace DazzaDev\DgtXmlGenerator\Builders;

use DazzaDev\DgtXmlGenerator\Models\Ticket\Ticket;

class TicketBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance
     */
    protected function createDocument(): Ticket
    {
        return new Ticket($this->documentData);
    }

    /**
     * Get document type for XML generation
     */
    protected function getDocumentType(): string
    {
        return 'ticket';
    }

    /**
     * Get ticket (alias for getDocument with proper return type)
     */
    public function getTicket(): Ticket
    {
        return $this->document;
    }
}
