<?php

namespace DazzaDev\DgtXmlGenerator\Builders;

use DazzaDev\DgtXmlGenerator\Models\CreditNote\CreditNote;
use DazzaDev\DgtXmlGenerator\Models\DebitNote\DebitNote;
use DazzaDev\DgtXmlGenerator\Models\Document;
use DazzaDev\DgtXmlGenerator\Models\Entities\Issuer;
use DazzaDev\DgtXmlGenerator\Models\Entities\Receiver;
use DazzaDev\DgtXmlGenerator\Models\Invoice\Invoice;
use DazzaDev\DgtXmlGenerator\Models\Ticket\Ticket;
use DazzaDev\DgtXmlGenerator\XmlHelper;
use DOMDocument;
use InvalidArgumentException;

abstract class BaseDocumentBuilder
{
    protected array $documentData;

    protected Document $document;

    public function __construct(array $documentData)
    {
        $this->documentData = $documentData;

        // Validate required data
        $this->validateRequiredData();

        // Initialize document (implemented by child classes)
        $this->document = $this->createDocument();

        // Set document properties
        $this->setDocumentProperties();

        // Set issuer
        $this->setIssuer();

        // Set receiver
        $this->setReceiver();

        // Set payments
        $this->setPayments();

        // Set referenced documents
        $this->setReferencedDocuments();

        // Set additional info
        $this->setAdditionalInfo();
    }

    /**
     * Create document instance (must be implemented by child classes)
     */
    abstract protected function createDocument(): Invoice|CreditNote|DebitNote|Ticket;

    /**
     * Get document type for XML generation (must be implemented by child classes)
     */
    abstract protected function getDocumentType(): string;

    /**
     * Get additional required fields specific to document type
     */
    protected function getAdditionalRequiredFields(): array
    {
        return [];
    }

    /**
     * Get document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }

    /**
     * Get document key
     */
    public function getDocumentKey(): string
    {
        return $this->document->getDocumentKey();
    }

    /**
     * Get document XML
     */
    public function getXml(): DOMDocument
    {
        return (new XmlHelper)->getXml(
            $this->getDocumentType(),
            $this->document->toArray()
        );
    }

    /**
     * Validate required data
     */
    protected function validateRequiredData(): void
    {
        $baseRequiredFields = [
            'establishment',
            'emission_point',
            'sequential',
            'date',
            'situation',
            'sale_condition',
            'security_key',
            'currency',
            'issuer',
            'receiver',
            'line_items',
            'summary',
        ];

        // Merge with document-specific required fields
        $requiredFields = array_merge($baseRequiredFields, $this->getAdditionalRequiredFields());

        foreach ($requiredFields as $field) {
            if (! isset($this->documentData[$field])) {
                throw new InvalidArgumentException("Missing required field: {$field}");
            }
        }
    }

    /**
     * Set document properties
     */
    protected function setDocumentProperties(): void
    {
        // Establishment
        $this->document->setEstablishment($this->documentData['establishment']);

        // Emission Point
        $this->document->setEmissionPoint($this->documentData['emission_point']);

        // Set sequential
        $this->document->setSequential($this->documentData['sequential']);

        // Set date
        $this->document->setDate($this->documentData['date']);

        // Set situation
        $this->document->setSituation($this->documentData['situation']);

        // Set sale condition
        $this->document->setSaleCondition($this->documentData['sale_condition']);

        // Set security key
        $this->document->setSecurityKey($this->documentData['security_key']);

        // Currency
        $this->document->setCurrency($this->documentData['currency']);

        // Line items
        $this->document->setLineItems($this->documentData['line_items']);

        // Summary
        $this->document->setSummary($this->documentData['summary']);
    }

    /**
     * Set company
     */
    protected function setIssuer(): void
    {
        $issuerData = $this->documentData['issuer'];
        $issuer = new Issuer;

        // Required fields
        $issuer->setIdentificationType($issuerData['identification_type']);
        $issuer->setIdentificationNumber($issuerData['identification_number']);
        $issuer->setName($issuerData['name']);

        // Optional fields
        if (isset($issuerData['trade_name'])) {
            $issuer->setTradeName($issuerData['trade_name']);
        }

        // Activity
        $issuer->setActivity($issuerData['activity']);

        // Location
        $issuer->setLocation($issuerData['location']);

        // Phone
        $issuer->setPhone($issuerData['phone']);

        // Email
        $issuer->setEmail($issuerData['email']);

        $this->document->setIssuer($issuer);
    }

    /**
     * Set receiver
     */
    protected function setReceiver(): void
    {
        $receiverData = $this->documentData['receiver'];
        $receiver = new Receiver;

        // Required fields
        $receiver->setIdentificationType($receiverData['identification_type']);
        $receiver->setIdentificationNumber($receiverData['identification_number']);
        $receiver->setName($receiverData['name']);

        // Optional fields
        if (isset($receiverData['trade_name'])) {
            $receiver->setTradeName($receiverData['trade_name']);
        }

        // Activity
        if (isset($receiverData['activity'])) {
            $receiver->setActivity($receiverData['activity']);
        }

        // Location
        $receiver->setLocation($receiverData['location']);

        // Phone
        $receiver->setPhone($receiverData['phone']);

        // Email
        $receiver->setEmail($receiverData['email']);

        $this->document->setReceiver($receiver);
    }

    /**
     * Set payments
     */
    protected function setPayments(): void
    {
        $payments = $this->documentData['payments'] ?? [];
        if (count($payments) > 0) {
            $this->document->setPayments($payments);
        }
    }

    /**
     * Set referenced documents
     */
    protected function setReferencedDocuments(): void
    {
        $referencedDocuments = $this->documentData['referenced_documents'] ?? [];
        if (count($referencedDocuments) > 0) {
            $this->document->setReferencedDocuments($referencedDocuments);
        }
    }

    /**
     * Set additional info
     */
    protected function setAdditionalInfo(): void
    {
        $additionalInfo = $this->documentData['additional_info'] ?? [];
        if (count($additionalInfo) > 0) {
            $this->document->setAdditionalInfo($additionalInfo);
        }
    }
}
