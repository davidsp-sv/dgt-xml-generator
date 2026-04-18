<?php

namespace DazzaDev\DgtXmlGenerator\Builders;

use DazzaDev\DgtXmlGenerator\Models\PurchaseInvoice\PurchaseInvoice;
use InvalidArgumentException;
use LogicException;

class PurchaseInvoiceBuilder extends BaseDocumentBuilder
{
    /**
     * Create document instance
     */
    protected function createDocument(): PurchaseInvoice
    {
        return new PurchaseInvoice($this->documentData);
    }

    /**
     * FEC (08): XSD requires CodigoActividadReceptor; receiver must include activity.
     */
    protected function validateRequiredData(): void
    {
        parent::validateRequiredData();

        $activity = $this->documentData['receiver']['activity'] ?? null;
        if ($activity === null) {
            throw new InvalidArgumentException('FEC requires receiver.activity (CodigoActividadReceptor).');
        }
        if (is_array($activity) && empty($activity['code'])) {
            throw new InvalidArgumentException('FEC requires receiver.activity with a valid code.');
        }
    }

    /**
     * Get document type for XML generation (Twig view name without .xml.twig)
     */
    protected function getDocumentType(): string
    {
        return 'fec';
    }

    /**
     * @return PurchaseInvoice
     */
    public function getPurchaseInvoice(): PurchaseInvoice
    {
        if (! $this->document instanceof PurchaseInvoice) {
            throw new LogicException('Expected PurchaseInvoice document.');
        }

        return $this->document;
    }
}
