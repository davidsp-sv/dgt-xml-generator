<?php

namespace DazzaDev\DgtXmlGenerator\Models;

use DazzaDev\DgtXmlGenerator\DataLoader;

class Currency
{
    /**
     * Codigo Moneda
     */
    private array $currency = [];

    /**
     * Tipo de cambio
     */
    private float $exchangeRate = 1;

    /**
     * Currency constructor
     *
     * @param  array  $data  Currency data
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

        if (isset($data['currency_code'])) {
            $this->setCurrency($data['currency_code']);
        }

        if (isset($data['exchange_rate'])) {
            $this->setExchangeRate($data['exchange_rate']);
        }
    }

    /**
     * Get currency
     */
    public function getCurrency(): array
    {
        return $this->currency;
    }

    /**
     * Set currency
     */
    public function setCurrency(string $currencyCode = 'CRC'): void
    {
        $this->currency = (new DataLoader('monedas'))->getByCode($currencyCode);
    }

    /**
     * Get exchange rate
     */
    public function getExchangeRate(): float
    {
        return $this->exchangeRate;
    }

    /**
     * Set exchange rate
     */
    public function setExchangeRate(float $exchangeRate): void
    {
        $this->exchangeRate = $exchangeRate;
    }

    /**
     * Convert model to array
     */
    public function toArray(): array
    {
        return [
            'currency_code' => $this->getCurrency()['code'],
            'exchange_rate' => $this->getExchangeRate(),
        ];
    }
}
