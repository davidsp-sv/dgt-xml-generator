<?php

namespace DazzaDev\DgtXmlGenerator\Models;

class AdditionalInfo
{
    /**
     * Additional info type
     */
    private string $type = 'text';

    /**
     * Additional info code
     */
    private ?string $code = null;

    /**
     * Additional info value
     */
    private ?string $value = null;

    /**
     * AdditionalInfo constructor
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize additional info data
     */
    private function initialize(array $data): void
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

        if (isset($data['value'])) {
            $this->setValue($data['value']);
        }
    }

    /**
     * Get additional info type
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set additional info type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * Get additional info code
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Set additional info code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * Get additional info value
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * Set additional info value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'type' => $this->getType(),
            'code' => $this->getCode(),
            'value' => $this->getValue(),
        ];
    }
}
