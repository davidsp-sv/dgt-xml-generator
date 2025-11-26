<?php

namespace DazzaDev\DgtXmlGenerator\Models\Entities;

class Issuer extends EntityBase
{
    /**
     * Issuer constructor
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
