<?php

namespace DazzaDev\DgtXmlGenerator\Factories;

use DazzaDev\DgtXmlGenerator\Builders\BaseDocumentBuilder;
use DazzaDev\DgtXmlGenerator\Builders\CreditNoteBuilder;
use DazzaDev\DgtXmlGenerator\Builders\DebitNoteBuilder;
use DazzaDev\DgtXmlGenerator\Builders\InvoiceBuilder;
use DazzaDev\DgtXmlGenerator\Builders\PurchaseInvoiceBuilder;
use DazzaDev\DgtXmlGenerator\Builders\ReceiverMessageBuilder;
use DazzaDev\DgtXmlGenerator\Builders\TicketBuilder;
use InvalidArgumentException;

class DocumentBuilderFactory
{
    public const INVOICE = 'invoice';

    public const CREDIT_NOTE = 'credit-note';

    public const DEBIT_NOTE = 'debit-note';

    public const TICKET = 'ticket';

    public const RECEIVER_MESSAGE = 'receiver-message';

    public const FEC = 'fec';

    /**
     * Create a document builder based on document type name
     */
    public static function create(string $documentType, array $documentData): BaseDocumentBuilder|ReceiverMessageBuilder
    {
        return match ($documentType) {
            self::INVOICE => new InvoiceBuilder($documentData),
            self::CREDIT_NOTE => new CreditNoteBuilder($documentData),
            self::DEBIT_NOTE => new DebitNoteBuilder($documentData),
            self::TICKET => new TicketBuilder($documentData),
            self::RECEIVER_MESSAGE => new ReceiverMessageBuilder($documentData),
            self::FEC => new PurchaseInvoiceBuilder($documentData),
            default => throw new InvalidArgumentException("Unsupported document type: {$documentType}")
        };
    }

    /**
     * Create an invoice builder
     */
    public static function createInvoice(array $documentData): InvoiceBuilder
    {
        return new InvoiceBuilder($documentData);
    }

    /**
     * Create a credit note builder
     */
    public static function createCreditNote(array $documentData): CreditNoteBuilder
    {
        return new CreditNoteBuilder($documentData);
    }

    /**
     * Create a debit note builder
     */
    public static function createDebitNote(array $documentData): DebitNoteBuilder
    {
        return new DebitNoteBuilder($documentData);
    }

    /**
     * Create a ticket builder
     */
    public static function createTicket(array $documentData): TicketBuilder
    {
        return new TicketBuilder($documentData);
    }

    /**
     * Create a receiver message builder
     */
    public static function createReceiverMessage(array $documentData): ReceiverMessageBuilder
    {
        return new ReceiverMessageBuilder($documentData);
    }

    /**
     * Create a purchase invoice (FEC) builder
     */
    public static function createPurchaseInvoice(array $documentData): PurchaseInvoiceBuilder
    {
        return new PurchaseInvoiceBuilder($documentData);
    }
}
