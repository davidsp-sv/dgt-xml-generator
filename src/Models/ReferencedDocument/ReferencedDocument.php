<?php

namespace DazzaDev\DgtXmlGenerator\Models\ReferencedDocument;

use DazzaDev\DgtXmlGenerator\DataLoader;
use DazzaDev\DgtXmlGenerator\Models\DocumentType;

class ReferencedDocument
{
    /**
     * Document type
     */
    private DocumentType $documentType;

    /**
     * Other document type
     */
    private ?string $otherDocumentType = null;

    /**
     * Document number
     */
    private string $documentNumber;

    /**
     * Date of the referenced document
     */
    private string $emissionDate;

    /**
     * Referenced code
     */
    private ReferencedCode $referencedCode;

    /**
     * Other referenced code
     */
    private ?string $otherReferencedCode = null;

    /**
     * Reason
     */
    private string $reason;

    /**
     * Referenced document constructor
     *
     * @param  array  $data  Referenced document data
     */
    public function __construct(array $data)
    {
        $this->initialize($data);
    }

    /**
     * Initialize referenced document data
     *
     * @param  array  $data  Referenced document data
     */
    private function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['document_type'])) {
            $this->setDocumentType($data['document_type']);
        }

        if (isset($data['other_document_type'])) {
            $this->setOtherDocumentType($data['other_document_type']);
        }

        if (isset($data['document_number'])) {
            $this->setDocumentNumber($data['document_number']);
        }

        if (isset($data['emission_date'])) {
            $this->setEmissionDate($data['emission_date']);
        }

        if (isset($data['referenced_code'])) {
            $this->setReferencedCode($data['referenced_code']);
        }

        if (isset($data['other_referenced_code'])) {
            $this->setOtherReferencedCode($data['other_referenced_code']);
        }

        if (isset($data['reason'])) {
            $this->setReason($data['reason']);
        }
    }

    /**
     * Get document type
     */
    public function getDocumentType(): DocumentType
    {
        return $this->documentType;
    }

    /**
     * Set document type
     */
    public function setDocumentType(string $documentTypeCode): void
    {
        $documentType = (new DataLoader('tipos-documentos-referencia'))->getByCode($documentTypeCode);

        $this->documentType = new DocumentType($documentType);
    }

    /**
     * Get other document type
     */
    public function getOtherDocumentType(): ?string
    {
        return $this->otherDocumentType;
    }

    /**
     * Set other document type
     */
    public function setOtherDocumentType(string $otherDocumentType): void
    {
        $this->otherDocumentType = $otherDocumentType;
    }

    /**
     * Get document number
     */
    public function getDocumentNumber(): string
    {
        return $this->documentNumber;
    }

    /**
     * Set document number
     */
    public function setDocumentNumber(string $documentNumber): void
    {
        $this->documentNumber = $documentNumber;
    }

    /**
     * Get emission date
     */
    public function getEmissionDate(): string
    {
        return $this->emissionDate;
    }

    /**
     * Set emission date
     */
    public function setEmissionDate(string $emissionDate): void
    {
        $this->emissionDate = $emissionDate;
    }

    /**
     * Get referenced document type
     */
    public function getReferencedCode(): ReferencedCode
    {
        return $this->referencedCode;
    }

    /**
     * Set referenced document type
     */
    public function setReferencedCode(int|string|array|ReferencedCode $referencedCode): void
    {
        if (is_array($referencedCode)) {
            $this->referencedCode = new ReferencedCode($referencedCode);
        } elseif (is_string($referencedCode) || is_int($referencedCode)) {
            $referencedCodeData = (new DataLoader('codigos-referencia'))->getByCode((string) $referencedCode);
            $this->referencedCode = new ReferencedCode($referencedCodeData);
        } else {
            $this->referencedCode = $referencedCode;
        }
    }

    /**
     * Get other referenced code
     */
    public function getOtherReferencedCode(): ?string
    {
        return $this->otherReferencedCode;
    }

    /**
     * Set other referenced code
     */
    public function setOtherReferencedCode(string $otherReferencedCode): void
    {
        $this->otherReferencedCode = $otherReferencedCode;
    }

    /**
     * Get reason
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * Set reason
     */
    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'document_type' => $this->getDocumentType()->toArray(),
            'other_document_type' => $this->getOtherDocumentType(),
            'document_number' => $this->getDocumentNumber(),
            'emission_date' => $this->getEmissionDate(),
            'referenced_code' => $this->getReferencedCode()->toArray(),
            'other_referenced_code' => $this->getOtherReferencedCode(),
            'reason' => $this->getReason(),
        ];
    }
}
