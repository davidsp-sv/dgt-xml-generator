<?php

namespace DazzaDev\DgtXmlGenerator\Models\LineItem;

use DazzaDev\DgtXmlGenerator\DataLoader;

class CommercialCode
{
    /**
     * Type
     */
    private CommercialCodeType $type;

    /**
     * Code
     */
    private string $code;

    /**
     * Constructor
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize model data
     */
    protected function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['type'])) {
            $this->setType($data['type']);
        }

        if (isset($data['code'])) {
            $this->setCode($data['code']);
        }
    }

    /**
     * Get type
     */
    public function getType(): CommercialCodeType
    {
        return $this->type;
    }

    /**
     * Set type
     */
    public function setType(CommercialCodeType|array|int|string $type): void
    {
        if (is_array($type)) {
            $this->type = new CommercialCodeType($type);
        } elseif (is_int($type) || is_string($type)) {
            $typeData = (new DataLoader('tipos-codigos-item'))->getByCode($type);
            $this->type = new CommercialCodeType($typeData);
        } else {
            $this->type = $type;
        }
    }

    /**
     * Get code
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * Convert model to array
     */
    public function toArray(): array
    {
        return [
            'type' => $this->getType()->toArray(),
            'code' => $this->getCode(),
        ];
    }
}
