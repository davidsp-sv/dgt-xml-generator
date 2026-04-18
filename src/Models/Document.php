<?php

namespace DazzaDev\DgtXmlGenerator\Models;

use DazzaDev\DgtXmlGenerator\DataLoader;
use DazzaDev\DgtXmlGenerator\DateValidator;
use DazzaDev\DgtXmlGenerator\Models\Entities\Issuer;
use DazzaDev\DgtXmlGenerator\Models\Entities\Receiver;
use DazzaDev\DgtXmlGenerator\Models\LineItem\LineItem;
use DazzaDev\DgtXmlGenerator\Models\Payment\Payment;
use DazzaDev\DgtXmlGenerator\Models\ReferencedDocument\ReferencedDocument;

class Document
{
    /**
     * Document type
     */
    private DocumentType $documentType;

    /**
     * Date of the document
     */
    private string $date;

    /**
     * Establishment information
     */
    public string $establishment;

    /**
     * Emission point information
     */
    public string $emissionPoint;

    /**
     * Sequential number
     */
    private string $sequential;

    /**
     * Security key
     */
    private string $securityKey;

    /**
     * Situation
     */
    private ?Situation $situation = null;

    /**
     * SaleCondition
     */
    private ?SaleCondition $saleCondition = null;

    /**
     * Sale condition details
     */
    private ?string $saleConditionDetails = null;

    /**
     * Currency
     */
    private ?Currency $currency = null;

    /**
     * Issuer information
     */
    private Issuer $issuer;

    /**
     * Receiver information
     */
    private Receiver $receiver;

    /**
     * Line items information
     *
     * @var LineItem[]
     */
    private array $lineItems = [];

    /**
     * Payments information
     *
     * @var Payment[]
     */
    private array $payments = [];

    /**
     * Summary information
     */
    private Summary $summary;

    /**
     * Referenced documents
     *
     * @var ReferencedDocument[]
     */
    private array $referencedDocuments = [];

    /**
     * Additional information
     *
     * @var AdditionalInfo[]
     */
    private array $additionalInfo = [];

    /**
     * Document constructor
     *
     * @param  array  $data  Document data
     */
    public function __construct(array $data)
    {
        $this->initialize($data);
    }

    /**
     * Initialize document data
     *
     * @param  array  $data  Document data
     */
    private function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        // Date
        $this->setDate($data['date']);

        // Establishment
        $this->setEstablishment($data['establishment']);

        // Emission Point
        $this->setEmissionPoint($data['emission_point']);

        // Sequential
        $this->setSequential($data['sequential']);

        // Security Key
        $this->setSecurityKey($data['security_key']);

        // Situation
        $this->setSituation($data['situation']);

        // SaleCondition
        $this->setSaleCondition($data['sale_condition']);

        // Sale condition details
        if (isset($data['sale_condition_details'])) {
            $this->setSaleConditionDetails($data['sale_condition_details']);
        }

        // Currency
        $this->setCurrency($data['currency']);

        // Issuer
        $this->setIssuer($data['issuer']);

        // Receiver
        $this->setReceiver($data['receiver']);

        // Line items
        if (isset($data['line_items'])) {
            $this->setLineItems($data['line_items']);
        }

        // Payments
        if (isset($data['payments'])) {
            $this->setPayments($data['payments']);
        }

        // Summary
        $this->setSummary($data['summary']);

        // Referenced documents
        if (isset($data['referenced_documents'])) {
            $this->setReferencedDocuments($data['referenced_documents']);
        }

        // Additional info
        if (isset($data['additional_info'])) {
            $this->setAdditionalInfo($data['additional_info']);
        }
    }

    /**
     * Get document type
     */
    public function getDocumentType(): DocumentType
    {
        return $this->documentType;
    }

    /**
     * Set document type
     */
    public function setDocumentType(string $documentTypeCode): void
    {
        $documentType = (new DataLoader('tipos-comprobante'))->getByCode($documentTypeCode);

        $this->documentType = new DocumentType($documentType);
    }

    /**
     * Set date
     */
    public function setDate(string $date): void
    {
        (new DateValidator)->validate($date);

        $this->date = $date;
    }

    /**
     * Get date
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Get date parts in two digits
     */
    public function getTwoDigitDateParts(): array
    {
        return (new DateValidator)->getTwoDigitDateParts($this->date);
    }

    /**
     * Get establishment
     */
    public function getEstablishment(): string
    {
        return $this->establishment;
    }

    /**
     * Set establishment
     */
    public function setEstablishment(string $establishment): void
    {
        $this->establishment = $establishment;
    }

    /**
     * Get emission point
     */
    public function getEmissionPoint(): string
    {
        return $this->emissionPoint;
    }

    /**
     * Set emission point
     */
    public function setEmissionPoint(string $emissionPoint): void
    {
        $this->emissionPoint = $emissionPoint;
    }

    /**
     * Get sequential number
     */
    public function getSequential(): string
    {
        return $this->sequential;
    }

    /**
     * Set sequential number
     */
    public function setSequential(string $sequential): void
    {
        $this->sequential = $sequential;
    }

    /**
     * Get security key
     */
    public function getSecurityKey(): string
    {
        return $this->securityKey;
    }

    /**
     * Set security key
     */
    public function setSecurityKey(string $securityKey): void
    {
        $this->securityKey = $securityKey;
    }

    /**
     * Get document number
     */
    public function getSequentialNumber(): string
    {
        $establishment = $this->getEstablishment();
        $emissionPoint = $this->getEmissionPoint();
        $documentType = $this->getDocumentType()->getCode();
        $sequential = $this->getSequential();

        return $establishment.$emissionPoint.$documentType.$sequential;
    }

    /**
     * Get document key
     */
    public function getDocumentKey(): string
    {
        $sequentialNumber = $this->getSequentialNumber();
        $identificationNumber = str_pad((string) $this->getIssuer()->getIdentificationNumber(), 12, '0', STR_PAD_LEFT);
        $dateParts = $this->getTwoDigitDateParts();
        $situation = $this->getSituation()->getCode();
        $securityKey = $this->getSecurityKey();

        return 506 .$dateParts['day'].$dateParts['month'].$dateParts['year'].$identificationNumber.$sequentialNumber.$situation.$securityKey;
    }

    /**
     * Get situation
     */
    public function getSituation(): ?Situation
    {
        return $this->situation;
    }

    /**
     * Set situation
     */
    public function setSituation(int|string $situationCode): void
    {
        $situation = (new DataLoader('situacion-comprobantes'))->getByCode($situationCode);

        $this->situation = new Situation($situation);
    }

    /**
     * Get condition
     */
    public function getSaleCondition(): ?SaleCondition
    {
        return $this->saleCondition;
    }

    /**
     * Set condition
     */
    public function setSaleCondition(int|string $conditionCode): void
    {
        $condition = (new DataLoader('condiciones-venta'))->getByCode($conditionCode);

        $this->saleCondition = new SaleCondition($condition);
    }

    /**
     * Get sale condition details
     */
    public function getSaleConditionDetails(): ?string
    {
        return $this->saleConditionDetails;
    }

    /**
     * Set sale condition details
     */
    public function setSaleConditionDetails(string $saleConditionDetails): void
    {
        $this->saleConditionDetails = $saleConditionDetails;
    }

    /**
     * Get currency
     */
    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    /**
     * Set currency
     */
    public function setCurrency(array|Currency $currency): void
    {
        $this->currency = $currency instanceof Currency ? $currency : new Currency($currency);
    }

    /**
     * Get issuer
     */
    public function getIssuer(): Issuer
    {
        return $this->issuer;
    }

    /**
     * Set issuer
     */
    public function setIssuer(array|Issuer $issuer): void
    {
        $this->issuer = $issuer instanceof Issuer ? $issuer : new Issuer($issuer);
    }

    /**
     * Get receiver
     */
    public function getReceiver(): Receiver
    {
        return $this->receiver;
    }

    /**
     * Set receiver
     */
    public function setReceiver(array|Receiver $receiver): void
    {
        $this->receiver = $receiver instanceof Receiver ? $receiver : new Receiver($receiver);
    }

    /**
     * Get line items
     *
     * @return LineItem[]
     */
    public function getLineItems(): array
    {
        return $this->lineItems;
    }

    /**
     * Set line items
     */
    public function setLineItems(array $lineItems): void
    {
        $this->lineItems = [];
        foreach ($lineItems as $lineItem) {
            $this->addLineItem($lineItem);
        }
    }

    /**
     * Add line item
     */
    public function addLineItem(array|LineItem $lineItem): void
    {
        $this->lineItems[] = $lineItem instanceof LineItem ? $lineItem : new LineItem($lineItem);
    }

    /**
     * Get payments
     *
     * @return Payment[]
     */
    public function getPayments(): array
    {
        return $this->payments;
    }

    /**
     * Set payments
     */
    public function setPayments(array $payments): void
    {
        $this->payments = [];
        foreach ($payments as $payment) {
            $this->addPayment($payment);
        }
    }

    /**
     * Add payment item
     */
    public function addPayment(array|Payment $payment): void
    {
        $this->payments[] = $payment instanceof Payment ? $payment : new Payment($payment);
    }

    /**
     * Get totals
     */
    public function getSummary(): Summary
    {
        return $this->summary;
    }

    /**
     * Set summary
     */
    public function setSummary(array|Summary $summary): void
    {
        $this->summary = $summary instanceof Summary ? $summary : new Summary($summary);
    }

    /**
     * Get referenced documents
     *
     * @return ReferencedDocument[]
     */
    public function getReferencedDocuments(): array
    {
        return $this->referencedDocuments;
    }

    /**
     * Set referenced documents
     */
    public function setReferencedDocuments(array $referencedDocuments): void
    {
        $this->referencedDocuments = [];
        foreach ($referencedDocuments as $document) {
            $this->addReferencedDocument($document);
        }
    }

    /**
     * Add referenced document item
     */
    public function addReferencedDocument(array|ReferencedDocument $document): void
    {
        $this->referencedDocuments[] = $document instanceof ReferencedDocument ? $document : new ReferencedDocument($document);
    }

    /**
     * Get additional info
     *
     * @return AdditionalInfo[]
     */
    public function getAdditionalInfo(): array
    {
        return $this->additionalInfo;
    }

    /**
     * Set additional info
     */
    public function setAdditionalInfo(array $additionalInfo): void
    {
        $this->additionalInfo = [];
        foreach ($additionalInfo as $info) {
            $this->addAdditionalInfo($info);
        }
    }

    /**
     * Add additional info item
     */
    public function addAdditionalInfo(array|AdditionalInfo $info): void
    {
        $this->additionalInfo[] = $info instanceof AdditionalInfo ? $info : new AdditionalInfo($info);
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'document_type' => $this->getDocumentType()->toArray(),
            'sequential_number' => $this->getSequentialNumber(),
            'document_key' => $this->getDocumentKey(),
            'date' => $this->getDate(),
            'situation' => $this->getSituation()?->toArray(),
            'sale_condition' => $this->getSaleCondition()?->toArray(),
            'sale_condition_details' => $this->getSaleConditionDetails(),
            'currency' => $this->getCurrency()?->toArray(),
            'issuer' => $this->getIssuer()->toArray(),
            'receiver' => $this->getReceiver()->toArray(),
            'line_items' => array_map(fn (LineItem $lineItem) => $lineItem->toArray(), $this->getLineItems()),
            'payments' => array_map(fn (Payment $payment) => $payment->toArray(), $this->getPayments()),
            'summary' => $this->getSummary()->toArray(),
            'referenced_documents' => array_map(fn (ReferencedDocument $document) => $document->toArray(), $this->getReferencedDocuments()),
            'additional_info' => array_map(fn (AdditionalInfo $info) => $info->toArray(), $this->getAdditionalInfo()),
        ];
    }
}
