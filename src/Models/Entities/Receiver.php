<?php

namespace DazzaDev\DgtXmlGenerator\Models\Entities;

class Receiver extends EntityBase
{
    /**
     * Receiver constructor
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    /**
     * To array
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
