<?php

namespace DazzaDev\DgtXmlGenerator\Models\LineItem;

use DazzaDev\DgtXmlGenerator\DataLoader;
use DazzaDev\DgtXmlGenerator\Models\Discount\Discount;
use DazzaDev\DgtXmlGenerator\Models\Tax\Tax;
use DazzaDev\DgtXmlGenerator\Traits\TaxesTrait;

class LineItem
{
    use TaxesTrait;

    /**
     * CABYS Code
     */
    protected string $cabysCode;

    /**
     * Commercial Codes
     */
    protected array $commercialCodes = [];

    /**
     * Description
     */
    protected string $description;

    /**
     * Quantity
     */
    protected float $quantity = 0.0;

    /**
     * Unit Price
     */
    protected float $unitPrice = 0.0;

    /**
     * Total Amount
     */
    protected float $totalAmount = 0.0;

    /**
     * Sub Total
     */
    protected float $subTotal = 0.0;

    /**
     * Taxable Base
     */
    protected float $taxableBase = 0.0;

    /**
     * Assumed Factory Tax
     */
    protected float $assumedFactoryTax = 0.0;

    /**
     * Total Tax
     */
    protected float $totalTax = 0.0;

    /**
     * Total
     */
    protected float $total = 0.0;

    /**
     * Customs Tariff Code
     */
    protected ?string $customsTariffCode = null;

    /**
     * Unit of Measure
     */
    protected ?UnitMeasure $unitMeasure = null;

    /**
     * Commercial Unit of Measure
     */
    protected ?string $commercialUnitMeasure = null;

    /**
     * Transaction Type
     */
    protected ?TransactionType $transactionType = null;

    /**
     * VIN or Serial Numbers
     */
    protected array $vinOrSerialNumbers = [];

    /**
     * Medication Registration
     */
    protected ?string $medicationRegistration = null;

    /**
     * Pharmaceutical Form
     */
    protected ?PharmaceuticalForm $pharmaceuticalForm = null;

    /**
     * Discounts
     */
    protected array $discounts = [];

    /**
     * LineItem constructor
     *
     * @param  array  $data  LineItem data
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

        if (isset($data['customs_tariff_code'])) {
            $this->setCustomsTariffCode($data['customs_tariff_code']);
        }

        if (isset($data['cabys_code'])) {
            $this->setCabysCode($data['cabys_code']);
        }

        if (isset($data['commercial_codes'])) {
            $this->setCommercialCodes($data['commercial_codes']);
        }

        if (isset($data['commercial_unit_measure'])) {
            $this->setCommercialUnitMeasure($data['commercial_unit_measure']);
        }

        if (isset($data['unit_measure'])) {
            $this->setUnitMeasure($data['unit_measure']);
        }

        if (isset($data['description'])) {
            $this->setDescription($data['description']);
        }

        if (isset($data['quantity'])) {
            $this->setQuantity($data['quantity']);
        }

        if (isset($data['unit_price'])) {
            $this->setUnitPrice($data['unit_price']);
        }

        if (isset($data['total_amount'])) {
            $this->setTotalAmount($data['total_amount']);
        }

        if (isset($data['sub_total'])) {
            $this->setSubTotal($data['sub_total']);
        }

        if (isset($data['taxable_base'])) {
            $this->setTaxableBase($data['taxable_base']);
        }

        if (isset($data['assumed_factory_tax'])) {
            $this->setAssumedFactoryTax($data['assumed_factory_tax']);
        }

        if (isset($data['total_tax'])) {
            $this->setTotalTax($data['total_tax']);
        }

        if (isset($data['total'])) {
            $this->setTotal($data['total']);
        }

        if (isset($data['transaction_type'])) {
            $this->setTransactionType($data['transaction_type']);
        }

        if (isset($data['vin_or_serial_numbers'])) {
            $this->setVinOrSerialNumbers($data['vin_or_serial_numbers']);
        }

        if (isset($data['medication_registration'])) {
            $this->setMedicationRegistration($data['medication_registration']);
        }

        if (isset($data['pharmaceutical_form'])) {
            $this->setPharmaceuticalForm($data['pharmaceutical_form']);
        }

        if (isset($data['discounts'])) {
            $this->setDiscounts($data['discounts']);
        }

        if (isset($data['taxes'])) {
            $this->setTaxes($data['taxes']);
        }
    }

    /**
     * Get CABYS Code
     */
    public function getCabysCode(): string
    {
        return $this->cabysCode;
    }

    /**
     * Set CABYS Code
     */
    public function setCabysCode(string $cabysCode): void
    {
        $this->cabysCode = $cabysCode;
    }

    /**
     * Get Description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set Description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Get Quantity
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * Set Quantity
     */
    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * Get Unit Price
     */
    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    /**
     * Set Unit Price
     */
    public function setUnitPrice(float $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * Get Total Amount
     */
    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    /**
     * Set Total Amount
     */
    public function setTotalAmount(float $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * Get Sub Total
     */
    public function getSubTotal(): float
    {
        return $this->subTotal;
    }

    /**
     * Set Sub Total
     */
    public function setSubTotal(float $subTotal): void
    {
        $this->subTotal = $subTotal;
    }

    /**
     * Get Taxable Base
     */
    public function getTaxableBase(): float
    {
        return $this->taxableBase;
    }

    /**
     * Set Taxable Base
     */
    public function setTaxableBase(float $taxableBase): void
    {
        $this->taxableBase = $taxableBase;
    }

    /**
     * Get Assumed Factory Tax
     */
    public function getAssumedFactoryTax(): float
    {
        return $this->assumedFactoryTax;
    }

    /**
     * Set Assumed Factory Tax
     */
    public function setAssumedFactoryTax(float $assumedFactoryTax): void
    {
        $this->assumedFactoryTax = $assumedFactoryTax;
    }

    /**
     * Get Total Tax
     */
    public function getTotalTax(): float
    {
        return $this->totalTax;
    }

    /**
     * Set Total Tax
     */
    public function setTotalTax(float $totalTax): void
    {
        $this->totalTax = $totalTax;
    }

    /**
     * Get Total
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * Set Total
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    /**
     * Get Customs Tariff Code
     */
    public function getCustomsTariffCode(): ?string
    {
        return $this->customsTariffCode;
    }

    /**
     * Set Customs Tariff Code
     */
    public function setCustomsTariffCode(string $customsTariffCode): void
    {
        $this->customsTariffCode = $customsTariffCode;
    }

    /**
     * Get Commercial Codes
     */
    public function getCommercialCodes(): array
    {
        return $this->commercialCodes;
    }

    /**
     * Set Commercial Codes
     */
    public function setCommercialCodes(array $commercialCodes): void
    {
        $this->commercialCodes = [];
        foreach ($commercialCodes as $commercialCode) {
            $this->addCommercialCode($commercialCode);
        }
    }

    /**
     * Add Commercial Code
     */
    public function addCommercialCode(array|CommercialCode $commercialCode): void
    {
        $this->commercialCodes[] = $commercialCode instanceof CommercialCode ? $commercialCode : new CommercialCode($commercialCode);
    }

    /**
     * Get Unit of Measure
     */
    public function getUnitMeasure(): ?UnitMeasure
    {
        return $this->unitMeasure;
    }

    /**
     * Set Unit of Measure
     */
    public function setUnitMeasure(UnitMeasure|array|string $unitMeasure): void
    {
        if (is_array($unitMeasure)) {
            $this->unitMeasure = new UnitMeasure($unitMeasure);
        } elseif (is_string($unitMeasure)) {
            $data = (new DataLoader('unidades-medida'))->getByCode($unitMeasure);
            $this->unitMeasure = new UnitMeasure($data);
        } else {
            $this->unitMeasure = $unitMeasure;
        }
    }

    /**
     * Get Commercial Unit of Measure
     */
    public function getCommercialUnitMeasure(): ?string
    {
        return $this->commercialUnitMeasure;
    }

    /**
     * Set Commercial Unit of Measure
     */
    public function setCommercialUnitMeasure(string $commercialUnitMeasure): void
    {
        $this->commercialUnitMeasure = $commercialUnitMeasure;
    }

    /**
     * Get Transaction Type
     */
    public function getTransactionType(): ?TransactionType
    {
        return $this->transactionType;
    }

    /**
     * Set Transaction Type
     */
    public function setTransactionType(TransactionType|array|string $transactionType): void
    {
        if (is_array($transactionType)) {
            $this->transactionType = new TransactionType($transactionType);
        } elseif (is_string($transactionType)) {
            $data = (new DataLoader('tipos-transaccion'))->getByCode($transactionType);
            $this->transactionType = new TransactionType($data);
        } else {
            $this->transactionType = $transactionType;
        }
    }

    /**
     * Get VIN or Serial Numbers
     */
    public function getVinOrSerialNumbers(): array
    {
        return $this->vinOrSerialNumbers;
    }

    /**
     * Set VIN or Serial Numbers
     */
    public function setVinOrSerialNumbers(array|string $values): void
    {
        $this->vinOrSerialNumbers = [];
        if (is_array($values)) {
            foreach ($values as $value) {
                $this->addVinOrSerialNumber($value);
            }
        } else {
            $this->addVinOrSerialNumber($values);
        }
    }

    /**
     * Add VIN or Serial Number
     */
    public function addVinOrSerialNumber(string $value): void
    {
        $this->vinOrSerialNumbers[] = $value;
    }

    /**
     * Get Medication Registration
     */
    public function getMedicationRegistration(): ?string
    {
        return $this->medicationRegistration;
    }

    /**
     * Set Medication Registration
     */
    public function setMedicationRegistration(string $registration): void
    {
        $this->medicationRegistration = $registration;
    }

    /**
     * Get Pharmaceutical Form
     */
    public function getPharmaceuticalForm(): ?PharmaceuticalForm
    {
        return $this->pharmaceuticalForm;
    }

    /**
     * Set Pharmaceutical Form
     */
    public function setPharmaceuticalForm(PharmaceuticalForm|array|string $form): void
    {
        if (is_array($form)) {
            $this->pharmaceuticalForm = new PharmaceuticalForm($form);
        } elseif (is_string($form)) {
            $data = (new DataLoader('formas-farmaceuticas'))->getByCode($form);
            $this->pharmaceuticalForm = new PharmaceuticalForm($data);
        } else {
            $this->pharmaceuticalForm = $form;
        }
    }

    /**
     * Get discounts
     *
     * @return Discount[]
     */
    public function getDiscounts(): array
    {
        return $this->discounts;
    }

    /**
     * Set discounts
     */
    public function setDiscounts(array $discounts): void
    {
        $this->discounts = [];
        foreach ($discounts as $discount) {
            $this->addDiscount($discount);
        }
    }

    /**
     * Add discount item
     */
    public function addDiscount(array|Discount $discount): void
    {
        $this->discounts[] = $discount instanceof Discount ? $discount : new Discount($discount);
    }

    /**
     * Convert to array for XML generation
     */
    public function toArray(): array
    {
        return [
            'customs_tariff_code' => $this->getCustomsTariffCode(),
            'cabys_code' => $this->getCabysCode(),
            'commercial_codes' => array_map(fn (CommercialCode $c) => $c->toArray(), $this->getCommercialCodes()),
            'unit_measure' => $this->getUnitMeasure()?->toArray(),
            'commercial_unit_measure' => $this->getCommercialUnitMeasure(),
            'transaction_type' => $this->getTransactionType()?->toArray(),
            'vin_or_serial_numbers' => $this->getVinOrSerialNumbers(),
            'medication_registration' => $this->getMedicationRegistration(),
            'pharmaceutical_form' => $this->getPharmaceuticalForm()?->toArray(),
            'description' => $this->getDescription(),
            'quantity' => $this->getQuantity(),
            'unit_price' => $this->getUnitPrice(),
            'total_amount' => $this->getTotalAmount(),
            'sub_total' => $this->getSubTotal(),
            'taxable_base' => $this->getTaxableBase(),
            'assumed_factory_tax' => $this->getAssumedFactoryTax(),
            'total_tax' => $this->getTotalTax(),
            'total' => $this->getTotal(),
            'taxes' => array_map(fn (Tax $tax) => $tax->toArray(), $this->getTaxes()),
            'discounts' => array_map(fn (Discount $discount) => $discount->toArray(), $this->getDiscounts()),
        ];
    }
}
