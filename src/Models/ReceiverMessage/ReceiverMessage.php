<?php

namespace DazzaDev\DgtXmlGenerator\Models\ReceiverMessage;

use DazzaDev\DgtXmlGenerator\DataLoader;
use DazzaDev\DgtXmlGenerator\DateValidator;

class ReceiverMessage
{
    /**
     * Document Key.
     */
    private string $documentKey;

    /**
     * Issuer Identification Number.
     */
    private string $issuerIdentificationNumber;

    /**
     * Confirmation Date.
     */
    private string $date;

    /**
     * Message Type.
     */
    private MessageType $messageType;

    /**
     * Message Detail.
     */
    private ?string $messageDetail = null;

    /**
     * Receiver.
     */
    private ?Receiver $receiver = null;

    /**
     * Total Tax.
     */
    private ?float $totalTax = null;

    /**
     * Tax Condition.
     */
    private ?TaxCondition $taxCondition = null;

    /**
     * Total Tax To Credit.
     */
    private ?float $totalTaxToCredit = null;

    /**
     * Total Applicable Expense.
     */
    private ?float $totalApplicableExpense = null;

    /**
     * Total.
     */
    private ?float $total = null;

    /**
     * Receiver Message Constructor.
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

        if (isset($data['document_key'])) {
            $this->setDocumentKey($data['document_key']);
        }

        if (isset($data['issuer_identification_number'])) {
            $this->setIssuerIdentificationNumber($data['issuer_identification_number']);
        }

        if (isset($data['date'])) {
            $this->setDate($data['date']);
        }

        if (isset($data['message_type'])) {
            $this->setMessageType($data['message_type']);
        }

        if (isset($data['message_detail'])) {
            $this->setMessageDetail($data['message_detail']);
        }

        if (isset($data['receiver'])) {
            $this->setReceiver($data['receiver']);
        }

        if (isset($data['total_tax'])) {
            $this->setTotalTax($data['total_tax']);
        }

        if (isset($data['tax_condition'])) {
            $this->setTaxCondition($data['tax_condition']);
        }

        if (isset($data['total_tax_to_credit'])) {
            $this->setTotalTaxToCredit($data['total_tax_to_credit']);
        }

        if (isset($data['total_applicable_expense'])) {
            $this->setTotalApplicableExpense($data['total_applicable_expense']);
        }

        if (isset($data['total'])) {
            $this->setTotal($data['total']);
        }
    }

    /**
     * Get Document Key.
     */
    public function getDocumentKey(): string
    {
        return $this->documentKey;
    }

    /**
     * Set Document Key.
     */
    public function setDocumentKey(string $documentKey): void
    {
        $this->documentKey = $documentKey;
    }

    /**
     * Issuer Identification Number.
     */
    public function getIssuerIdentificationNumber(): string
    {
        return $this->issuerIdentificationNumber;
    }

    /**
     * Set Issuer Identification Number.
     */
    public function setIssuerIdentificationNumber(string $issuerIdentificationNumber): void
    {
        $this->issuerIdentificationNumber = $issuerIdentificationNumber;
    }

    /**
     * Confirmation Date.
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Set Confirmation Date.
     */
    public function setDate(string $date): void
    {
        (new DateValidator)->validate($date);

        $this->date = $date;
    }

    /**
     * Message Type.
     */
    public function getMessageType(): MessageType
    {
        return $this->messageType;
    }

    /**
     * Set Message Type.
     */
    public function setMessageType(int|string|array|MessageType $messageType): void
    {
        if (is_array($messageType)) {
            $this->messageType = new MessageType($messageType);
        } elseif (is_int($messageType) || is_string($messageType)) {
            $messageTypeData = (new DataLoader('codigos-mensaje'))->getByCode($messageType);
            $this->messageType = new MessageType($messageTypeData);
        } else {
            $this->messageType = $messageType;
        }
    }

    /**
     * Message Detail.
     */
    public function getMessageDetail(): ?string
    {
        return $this->messageDetail;
    }

    /**
     * Set Message Detail.
     */
    public function setMessageDetail(string $messageDetail): void
    {
        $this->messageDetail = $messageDetail;
    }

    /**
     * Receiver.
     */
    public function getReceiver(): ?Receiver
    {
        return $this->receiver;
    }

    /**
     * Set Receiver.
     */
    public function setReceiver(array|Receiver $receiver): void
    {
        if (is_array($receiver)) {
            $this->receiver = new Receiver($receiver);
        } else {
            $this->receiver = $receiver;
        }
    }

    /**
     * Total Tax.
     */
    public function getTotalTax(): ?float
    {
        return $this->totalTax;
    }

    /**
     * Set Total Tax.
     */
    public function setTotalTax(float $totalTax): void
    {
        $this->totalTax = $totalTax;
    }

    /**
     * Tax Condition.
     */
    public function getTaxCondition(): ?TaxCondition
    {
        return $this->taxCondition;
    }

    /**
     * Set Tax Condition.
     */
    public function setTaxCondition(int|string|array|TaxCondition $taxCondition): void
    {
        if (is_array($taxCondition)) {
            $this->taxCondition = new TaxCondition($taxCondition);
        } elseif (is_int($taxCondition) || is_string($taxCondition)) {
            $taxConditionData = (new DataLoader('condiciones-impuesto'))->getByCode($taxCondition);
            $this->taxCondition = new TaxCondition($taxConditionData);
        } else {
            $this->taxCondition = $taxCondition;
        }
    }

    /**
     * Total Tax To Credit.
     */
    public function getTotalTaxToCredit(): ?float
    {
        return $this->totalTaxToCredit;
    }

    /**
     * Set Total Tax To Credit.
     */
    public function setTotalTaxToCredit(float $amount): void
    {
        $this->totalTaxToCredit = $amount;
    }

    /**
     * Total Applicable Expense.
     */
    public function getTotalApplicableExpense(): ?float
    {
        return $this->totalApplicableExpense;
    }

    /**
     * Set Total Applicable Expense.
     */
    public function setTotalApplicableExpense(float $amount): void
    {
        $this->totalApplicableExpense = $amount;
    }

    /**
     * Total.
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * Set Total.
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    /**
     * Convert the model to an array.
     */
    public function toArray(): array
    {
        return [
            'document_key' => $this->getDocumentKey(),
            'issuer_identification_number' => $this->getIssuerIdentificationNumber(),
            'date' => $this->getDate(),
            'message_type' => $this->getMessageType()->toArray(),
            'message_detail' => $this->getMessageDetail(),
            'receiver' => $this->getReceiver()?->toArray(),
            'total_tax' => $this->getTotalTax(),
            'tax_condition' => $this->getTaxCondition()?->toArray(),
            'total_tax_to_credit' => $this->getTotalTaxToCredit(),
            'total_applicable_expense' => $this->getTotalApplicableExpense(),
            'total' => $this->getTotal(),
        ];
    }
}
