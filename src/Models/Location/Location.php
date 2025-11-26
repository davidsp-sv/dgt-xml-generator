<?php

namespace DazzaDev\DgtXmlGenerator\Models\Location;

use DazzaDev\DgtXmlGenerator\DataLoader;

class Location
{
    /**
     * Province
     */
    private ?Province $province = null;

    /**
     * Canton
     */
    private ?Canton $canton = null;

    /**
     * District
     */
    private ?District $district = null;

    /**
     * Neighborhood
     */
    private ?string $neighborhood = null;

    /**
     * Address Details
     */
    private ?string $addressDetails = null;

    /**
     * Foreign Address Details
     */
    private ?string $foreignAddressDetails = null;

    /**
     * Location constructor
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

        if (isset($data['province'])) {
            $this->setProvince($data['province']);
        }

        if (isset($data['canton'])) {
            $this->setCanton($data['canton']);
        }

        if (isset($data['district'])) {
            $this->setDistrict($data['district']);
        }

        if (isset($data['neighborhood'])) {
            $this->setNeighborhood($data['neighborhood']);
        }

        if (isset($data['address_details'])) {
            $this->setAddressDetails($data['address_details']);
        }

        if (isset($data['foreign_address_details'])) {
            $this->setForeignAddressDetails($data['foreign_address_details']);
        }
    }

    /**
     * Get province
     */
    public function getProvince(): ?Province
    {
        return $this->province;
    }

    /**
     * Set province
     */
    public function setProvince(string|int $provinceCode): void
    {
        $province = (new DataLoader('provincias'))->getByCode($provinceCode);

        $this->province = new Province($province);
    }

    /**
     * Get canton
     */
    public function getCanton(): ?Canton
    {
        return $this->canton;
    }

    /**
     * Set canton
     */
    public function setCanton(string|int $canton): void
    {
        $canton = (new DataLoader('cantones'))->getByCode($canton);

        $this->canton = new Canton($canton);
    }

    /**
     * Get district
     */
    public function getDistrict(): ?District
    {
        return $this->district;
    }

    /**
     * Set district
     */
    public function setDistrict(string|int $district): void
    {
        $district = (new DataLoader('distritos'))->getByCode($district);

        $this->district = new District($district);
    }

    /**
     * Get neighborhood
     */
    public function getNeighborhood(): ?string
    {
        return $this->neighborhood;
    }

    /**
     * Set neighborhood
     */
    public function setNeighborhood(string $neighborhood): void
    {
        $this->neighborhood = $neighborhood;
    }

    /**
     * Get address details
     */
    public function getAddressDetails(): ?string
    {
        return $this->addressDetails;
    }

    /**
     * Set address details
     */
    public function setAddressDetails(string $addressDetails): void
    {
        $this->addressDetails = $addressDetails;
    }

    /**
     * Get foreign address details
     */
    public function getForeignAddressDetails(): ?string
    {
        return $this->foreignAddressDetails;
    }

    /**
     * Set foreign address details
     */
    public function setForeignAddressDetails(string $foreignAddressDetails): void
    {
        $this->foreignAddressDetails = $foreignAddressDetails;
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'province' => $this->getProvince()?->toArray(),
            'canton' => $this->getCanton()?->toArray(),
            'district' => $this->getDistrict()?->toArray(),
            'neighborhood' => $this->getNeighborhood(),
            'address_details' => $this->getAddressDetails(),
            'foreign_address_details' => $this->getForeignAddressDetails(),
        ];
    }
}
