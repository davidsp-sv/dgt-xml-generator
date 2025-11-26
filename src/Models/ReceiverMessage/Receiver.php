<?php

namespace DazzaDev\DgtXmlGenerator\Models\ReceiverMessage;

class Receiver
{
    /**
     * Activity.
     */
    private ?string $activity = null;

    /**
     * Identification Number.
     */
    private ?string $identificationNumber = null;

    /**
     * Sequential Number.
     */
    private ?string $sequentialNumber = null;

    /**
     * Receiver Constructor.
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize the model with the given data.
     */
    private function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['activity'])) {
            $this->setActivity($data['activity']);
        }

        if (isset($data['identification_number'])) {
            $this->setIdentificationNumber($data['identification_number']);
        }

        if (isset($data['sequential_number'])) {
            $this->setSequentialNumber($data['sequential_number']);
        }
    }

    /**
     * Get Activity.
     */
    public function getActivity(): ?string
    {
        return $this->activity;
    }

    /**
     * Set Activity.
     */
    public function setActivity(string $activity): void
    {
        $this->activity = $activity;
    }

    /**
     * Get Identification Number.
     */
    public function getIdentificationNumber(): ?string
    {
        return $this->identificationNumber;
    }

    /**
     * Set Identification Number.
     */
    public function setIdentificationNumber(string $identificationNumber): void
    {
        $this->identificationNumber = $identificationNumber;
    }

    /**
     * Get Sequential Number.
     */
    public function getSequentialNumber(): ?string
    {
        return $this->sequentialNumber;
    }

    /**
     * Set Sequential Number.
     */
    public function setSequentialNumber(string $sequentialNumber): void
    {
        $this->sequentialNumber = $sequentialNumber;
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'activity' => $this->getActivity(),
            'identification_number' => $this->getIdentificationNumber(),
            'sequential_number' => $this->getSequentialNumber(),
        ];
    }
}
