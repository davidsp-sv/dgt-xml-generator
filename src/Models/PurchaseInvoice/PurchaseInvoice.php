<?php

namespace DazzaDev\DgtXmlGenerator\Models\PurchaseInvoice;

use DazzaDev\DgtXmlGenerator\Models\Document;

/**
 * Factura electrónica de compras (08) — emisor = comprador, receptor = proveedor.
 */
class PurchaseInvoice extends Document
{
    /**
     * PurchaseInvoice constructor
     */
    public function __construct(array $data = [])
    {
        $this->setDocumentType('08');

        if (empty($data)) {
            parent::__construct($data);
        }
    }
}
