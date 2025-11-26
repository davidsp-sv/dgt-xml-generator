<?php

namespace DazzaDev\DgtXmlGenerator\Models\Tax;

use DazzaDev\DgtXmlGenerator\DataLoader;

class Tax
{
    /**
     * Tax type
     */
    public TaxType $taxType;

    /**
     * Other tax type
     */
    public ?string $otherTaxType = null;

    /**
     * Iva type
     */
    public ?IvaType $ivaType = null;

    /**
     * Tax rate
     */
    public ?float $rate = null;

    /**
     * Tax amount
     */
    public float $amount;

    /**
     * Tax constructor
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize tax data
     */
    protected function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['tax_type'])) {
            $this->setTaxType($data['tax_type']);
        }

        if (isset($data['other_tax_type'])) {
            $this->setOtherTaxType($data['other_tax_type']);
        }

        if (isset($data['iva_type'])) {
            $this->setIvaType($data['iva_type']);
        }

        if (isset($data['rate'])) {
            $this->setRate($data['rate']);
        }

        if (isset($data['amount'])) {
            $this->setAmount($data['amount']);
        }
    }

    /**
     * Get tax type
     */
    public function getTaxType(): TaxType
    {
        return $this->taxType;
    }

    /**
     * Set tax type
     */
    public function setTaxType(int|string $taxTypeCode): void
    {
        $taxType = (new DataLoader('impuestos'))->getByCode($taxTypeCode);

        $this->taxType = new TaxType($taxType);
    }

    /**
     * Get other tax type
     */
    public function getOtherTaxType(): ?string
    {
        return $this->otherTaxType;
    }

    /**
     * Set other tax type
     */
    public function setOtherTaxType(string $otherTaxType): void
    {
        $this->otherTaxType = $otherTaxType;
    }

    /**
     * Get iva type
     */
    public function getIvaType(): ?IvaType
    {
        return $this->ivaType;
    }

    /**
     * Set iva type
     */
    public function setIvaType(int|string $ivaTypeCode): void
    {
        $ivaType = (new DataLoader('codigos-tarifas-iva'))->getByCode($ivaTypeCode);

        $this->ivaType = new IvaType($ivaType);
    }

    /**
     * Get tax rate
     */
    public function getRate(): ?float
    {
        return $this->rate;
    }

    /**
     * Set tax rate
     */
    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * Get tax amount
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Set tax amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'tax_type' => $this->getTaxType()->toArray(),
            'other_tax_type' => $this->getOtherTaxType(),
            'iva_type' => $this->getIvaType()?->toArray(),
            'rate' => $this->getRate(),
            'amount' => $this->getAmount(),
        ];
    }
}
