<?php

namespace DazzaDev\DgtXmlGenerator\Traits;

use DazzaDev\DgtXmlGenerator\Models\Tax\Tax;

/**
 * Trait Taxes
 */
trait TaxesTrait
{
    /**
     * Taxes
     */
    protected array $taxes = [];

    /**
     * Get taxes
     *
     * @return Tax[]
     */
    public function getTaxes(): array
    {
        return $this->taxes;
    }

    /**
     * Set taxes
     */
    public function setTaxes(array $taxes): void
    {
        $this->taxes = [];
        foreach ($taxes as $tax) {
            $this->addTax($tax);
        }
    }

    /**
     * Add tax item
     */
    public function addTax(array|Tax $tax): void
    {
        $this->taxes[] = $tax instanceof Tax ? $tax : new Tax($tax);
    }
}
