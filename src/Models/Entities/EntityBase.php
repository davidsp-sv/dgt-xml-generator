<?php

namespace DazzaDev\DgtXmlGenerator\Models\Entities;

use DazzaDev\DgtXmlGenerator\DataLoader;
use DazzaDev\DgtXmlGenerator\Models\Location\Location;

abstract class EntityBase
{
    /**
     * Identification type
     */
    private IdentificationType $identificationType;

    /**
     * Identification number
     */
    private string $identificationNumber;

    /**
     * Name
     */
    public string $name;

    /**
     * Trade name
     */
    public ?string $tradeName = null;

    /**
     * Activity
     */
    private ?Activity $activity = null;

    /**
     * Location
     */
    private ?Location $location = null;

    /**
     * Phone number with country code
     */
    public ?Phone $phone = null;

    /**
     * Email addresses
     */
    public array $email = [];

    /**
     * Alcoholic beverages fiscal registry (Law 8707)
     */
    private ?string $fiscalRegistry8707 = null;

    /**
     * Constructor to initialize the Company model
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize data
     */
    private function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['identification_type'])) {
            $this->setIdentificationType($data['identification_type']);
        }

        if (isset($data['identification_number'])) {
            $this->setIdentificationNumber($data['identification_number']);
        }

        if (isset($data['name'])) {
            $this->setName($data['name']);
        }

        if (isset($data['trade_name'])) {
            $this->setTradeName($data['trade_name']);
        }

        if (isset($data['activity'])) {
            $this->setActivity($data['activity']);
        }

        if (isset($data['location'])) {
            $this->setLocation($data['location']);
        }

        if (isset($data['phone'])) {
            $this->setPhone($data['phone']);
        }

        if (isset($data['email'])) {
            $this->setEmail($data['email']);
        }

        if (isset($data['fiscal_registry_8707'])) {
            $this->setFiscalRegistry8707($data['fiscal_registry_8707']);
        }
    }

    /**
     * Get identification type
     */
    public function getIdentificationType(): IdentificationType
    {
        return $this->identificationType;
    }

    /**
     * Set identification type
     */
    public function setIdentificationType(int|string $identificationTypeCode): void
    {
        $identificationType = (new DataLoader('tipos-identificacion'))->getByCode($identificationTypeCode);

        $this->identificationType = new IdentificationType($identificationType);
    }

    /**
     * Get identification number
     */
    public function getIdentificationNumber(): string
    {
        return $this->identificationNumber;
    }

    /**
     * Set identification number
     */
    public function setIdentificationNumber(string $identificationNumber): void
    {
        $this->identificationNumber = $identificationNumber;
    }

    /**
     * Get name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get trade name
     */
    public function getTradeName(): ?string
    {
        return $this->tradeName;
    }

    /**
     * Set trade name
     */
    public function setTradeName(string $tradeName): void
    {
        $this->tradeName = $tradeName;
    }

    /**
     * Get activity
     */
    public function getActivity(): ?Activity
    {
        return $this->activity;
    }

    /**
     * Set activity
     */
    public function setActivity(int|string $activityCode): void
    {
        $activity = (new DataLoader('actividades-economicas'))->getByCode($activityCode);

        $this->activity = new Activity($activity);
    }

    /**
     * Get location
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * Set location
     */
    public function setLocation(Location|array $location): void
    {
        if (is_array($location)) {
            $location = new Location($location);
        }

        $this->location = $location;
    }

    /**
     * Get phone number with country code
     */
    public function getPhone(): ?Phone
    {
        return $this->phone;
    }

    /**
     * Set phone number with country code
     */
    public function setPhone(Phone|array $phone): void
    {
        if (is_array($phone)) {
            $phone = new Phone($phone);
        }

        $this->phone = $phone;
    }

    /**
     * Get email
     */
    public function getEmail(): array
    {
        return $this->email;
    }

    /**
     * Set email addresses (array or comma-separated string)
     */
    public function setEmail(string|array $email): void
    {
        if (is_string($email)) {
            $parts = array_map(static fn ($e) => trim((string) $e), explode(',', $email));
        } else {
            $parts = array_map(static fn ($e) => trim((string) $e), $email);
        }

        $parts = array_values(array_filter($parts, static fn ($e) => $e !== ''));

        $this->email = $parts;
    }

    /**
     * Get alcoholic beverages fiscal registry (Law 8707)
     */
    public function getFiscalRegistry8707(): ?string
    {
        return $this->fiscalRegistry8707;
    }

    /**
     * Set alcoholic beverages fiscal registry (Law 8707)
     */
    public function setFiscalRegistry8707(string $fiscalRegistry8707): void
    {
        $this->fiscalRegistry8707 = $fiscalRegistry8707;
    }

    /**
     * Get base array representation
     */
    protected function getBaseArray(): array
    {
        return [
            'identification_type' => $this->getIdentificationType()->toArray(),
            'identification_number' => $this->getIdentificationNumber(),
            'name' => $this->getName(),
            'trade_name' => $this->getTradeName(),
            'fiscal_registry_8707' => $this->getFiscalRegistry8707(),
            'activity' => $this->getActivity()?->toArray(),
            'location' => $this->getLocation()?->toArray(),
            'phone' => $this->getPhone()?->toArray(),
            'email' => $this->getEmail(),
        ];
    }

    /**
     * Get array representation
     */
    abstract public function toArray(): array;
}
