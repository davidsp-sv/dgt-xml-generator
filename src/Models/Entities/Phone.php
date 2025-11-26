<?php

namespace DazzaDev\DgtXmlGenerator\Models\Entities;

class Phone
{
    /**
     * Country code
     */
    private string $countryCode = '';

    /**
     * Phone number
     */
    private string $number = '';

    /**
     * Phone constructor
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

        if (isset($data['country_code'])) {
            $this->setCountryCode($data['country_code']);
        }

        if (isset($data['number'])) {
            $this->setNumber($data['number']);
        }
    }

    /**
     * Get country code
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * Set country code
     */
    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * Get phone number
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * Set phone number
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'country_code' => $this->getCountryCode(),
            'number' => $this->getNumber(),
        ];
    }
}
