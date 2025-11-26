<?php

namespace DazzaDev\DgtXmlGenerator\Models\Discount;

use DazzaDev\DgtXmlGenerator\DataLoader;

class Discount
{
    /**
     * Discount type information
     */
    public DiscountType $discountType;

    /**
     * Discount amount
     */
    public ?string $otherDiscountType = null;

    /**
     * Discount description
     */
    public ?string $description = null;

    /**
     * Discount amount
     */
    public float $amount = 0.0;

    /**
     * Discount constructor
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize discount data
     */
    protected function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['discount_type'])) {
            $this->setDiscountType($data['discount_type']);
        }

        if (isset($data['other_discount_type'])) {
            $this->setOtherDiscountType($data['other_discount_type']);
        }

        if (isset($data['description'])) {
            $this->setDescription($data['description']);
        }

        if (isset($data['amount'])) {
            $this->setAmount($data['amount']);
        }
    }

    /**
     * Get discount type
     */
    public function getDiscountType(): DiscountType
    {
        return $this->discountType;
    }

    /**
     * Set discount type
     */
    public function setDiscountType(DiscountType|array|int|string $discountType): void
    {
        if (is_array($discountType)) {
            $this->discountType = new DiscountType($discountType);
        } elseif (is_int($discountType) || is_string($discountType)) {
            $discountTypeData = (new DataLoader('tipos-descuento'))->getByCode($discountType);
            $this->discountType = new DiscountType($discountTypeData);
        } else {
            $this->discountType = $discountType;
        }
    }

    /**
     * Get other discount type
     */
    public function getOtherDiscountType(): ?string
    {
        return $this->otherDiscountType;
    }

    /**
     * Set other discount type
     */
    public function setOtherDiscountType(string $otherDiscountType): void
    {
        $this->otherDiscountType = $otherDiscountType;
    }

    /**
     * Get discount description
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set discount description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Get discount amount
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Set discount amount
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
            'discount_type' => $this->getDiscountType()->toArray(),
            'other_discount_type' => $this->getOtherDiscountType(),
            'description' => $this->getDescription(),
            'amount' => $this->getAmount(),
        ];
    }
}
