<?php

namespace DazzaDev\DgtXmlGenerator\Models;

use DazzaDev\DgtXmlGenerator\Models\Tax\Tax;
use DazzaDev\DgtXmlGenerator\Traits\TaxesTrait;

class Summary
{
    use TaxesTrait;

    /**
     * Total servicios gravados con IVA
     */
    private float $totalTaxedServices = 0.0;

    /**
     * Total servicios exentos de IVA
     */
    private float $totalExemptServices = 0.0;

    /**
     * Total servicios exonerados del IVA
     */
    private float $totalExoneratedServices = 0.0;

    /**
     * Total servicios No Sujetos de IVA
     */
    private float $totalNonTaxableServices = 0.0;

    /**
     * Total mercancías gravadas con IVA
     */
    private float $totalTaxedGoods = 0.0;

    /**
     * Total mercancías exentas de IVA
     */
    private float $totalExemptGoods = 0.0;

    /**
     * Total mercancías exoneradas del IVA
     */
    private float $totalExoneratedGoods = 0.0;

    /**
     * Total mercancías No Sujetas de IVA
     */
    private float $totalNonTaxableGoods = 0.0;

    /**
     * Total gravado
     */
    private float $totalTaxed = 0.0;

    /**
     * Total exento
     */
    private float $totalExempt = 0.0;

    /**
     * Total exonerado
     */
    private float $totalExonerated = 0.0;

    /**
     * Total No Sujeto
     */
    private float $totalNonTaxable = 0.0;

    /**
     * Total venta
     */
    private float $totalSale = 0.0;

    /**
     * Total descuentos
     */
    private float $totalDiscounts = 0.0;

    /**
     * Total venta neta
     */
    private float $totalNetSale = 0.0;

    /**
     * Total impuesto
     */
    private float $totalTax = 0.0;

    /**
     * Total comprobante
     */
    private float $totalVoucher = 0.0;

    /**
     * Summary constructor
     *
     * @param  array  $data  Summary data
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

        if (isset($data['total_taxed_services'])) {
            $this->setTotalTaxedServices($data['total_taxed_services']);
        }

        if (isset($data['total_exempt_services'])) {
            $this->setTotalExemptServices($data['total_exempt_services']);
        }

        if (isset($data['total_exonerated_services'])) {
            $this->setTotalExoneratedServices($data['total_exonerated_services']);
        }

        if (isset($data['total_non_taxable_services'])) {
            $this->setTotalNonTaxableServices($data['total_non_taxable_services']);
        }

        if (isset($data['total_taxed_goods'])) {
            $this->setTotalTaxedGoods($data['total_taxed_goods']);
        }

        if (isset($data['total_exempt_goods'])) {
            $this->setTotalExemptGoods($data['total_exempt_goods']);
        }

        if (isset($data['total_exonerated_goods'])) {
            $this->setTotalExoneratedGoods($data['total_exonerated_goods']);
        }

        if (isset($data['total_non_taxable_goods'])) {
            $this->setTotalNonTaxableGoods($data['total_non_taxable_goods']);
        }

        if (isset($data['total_taxed'])) {
            $this->setTotalTaxed($data['total_taxed']);
        }

        if (isset($data['total_exempt'])) {
            $this->setTotalExempt($data['total_exempt']);
        }

        if (isset($data['total_exonerated'])) {
            $this->setTotalExonerated($data['total_exonerated']);
        }

        if (isset($data['total_non_taxable'])) {
            $this->setTotalNonTaxable($data['total_non_taxable']);
        }

        if (isset($data['total_sale'])) {
            $this->setTotalSale($data['total_sale']);
        }

        if (isset($data['total_discounts'])) {
            $this->setTotalDiscounts($data['total_discounts']);
        }

        if (isset($data['total_net_sale'])) {
            $this->setTotalNetSale($data['total_net_sale']);
        }

        if (isset($data['total_tax'])) {
            $this->setTotalTax($data['total_tax']);
        }

        if (isset($data['total'])) {
            $this->setTotalVoucher($data['total']);
        }

        if (isset($data['taxes'])) {
            $this->setTaxes($data['taxes']);
        }
    }

    /**
     * Get total taxed services
     */
    public function getTotalTaxedServices(): ?float
    {
        return $this->totalTaxedServices;
    }

    /**
     * Set total taxed services
     */
    public function setTotalTaxedServices(float $totalTaxedServices): void
    {
        $this->totalTaxedServices = $totalTaxedServices;
    }

    /**
     * Get total exempt services
     */
    public function getTotalExemptServices(): ?float
    {
        return $this->totalExemptServices;
    }

    /**
     * Set total exempt services
     */
    public function setTotalExemptServices(float $totalExemptServices): void
    {
        $this->totalExemptServices = $totalExemptServices;
    }

    /**
     * Get total exonerated services
     */
    public function getTotalExoneratedServices(): ?float
    {
        return $this->totalExoneratedServices;
    }

    /**
     * Set total exonerated services
     */
    public function setTotalExoneratedServices(float $totalExoneratedServices): void
    {
        $this->totalExoneratedServices = $totalExoneratedServices;
    }

    /**
     * Get total non taxable services
     */
    public function getTotalNonTaxableServices(): ?float
    {
        return $this->totalNonTaxableServices;
    }

    /**
     * Set total non taxable services
     */
    public function setTotalNonTaxableServices(float $totalNonTaxableServices): void
    {
        $this->totalNonTaxableServices = $totalNonTaxableServices;
    }

    /**
     * Get total taxed goods
     */
    public function getTotalTaxedGoods(): ?float
    {
        return $this->totalTaxedGoods;
    }

    /**
     * Set total taxed goods
     */
    public function setTotalTaxedGoods(float $totalTaxedGoods): void
    {
        $this->totalTaxedGoods = $totalTaxedGoods;
    }

    /**
     * Get total goods exempt from VAT
     */
    public function getTotalExemptGoods(): ?float
    {
        return $this->totalExemptGoods;
    }

    /**
     * Set total goods exempt from VAT
     */
    public function setTotalExemptGoods(float $totalExemptGoods): void
    {
        $this->totalExemptGoods = $totalExemptGoods;
    }

    /**
     * Get total goods exonerated from VAT
     */
    public function getTotalExoneratedGoods(): ?float
    {
        return $this->totalExoneratedGoods;
    }

    /**
     * Set total goods exonerated from VAT
     */
    public function setTotalExoneratedGoods(float $totalExoneratedGoods): void
    {
        $this->totalExoneratedGoods = $totalExoneratedGoods;
    }

    /**
     * Get total goods not subject to VAT
     */
    public function getTotalNonTaxableGoods(): ?float
    {
        return $this->totalNonTaxableGoods;
    }

    /**
     * Set total goods not subject to VAT
     */
    public function setTotalNonTaxableGoods(float $totalNonTaxableGoods): void
    {
        $this->totalNonTaxableGoods = $totalNonTaxableGoods;
    }

    /**
     * Get total taxed
     */
    public function getTotalTaxed(): ?float
    {
        return $this->totalTaxed;
    }

    /**
     * Set total taxed
     */
    public function setTotalTaxed(float $totalTaxed): void
    {
        $this->totalTaxed = $totalTaxed;
    }

    /**
     * Get total exempt
     */
    public function getTotalExempt(): ?float
    {
        return $this->totalExempt;
    }

    /**
     * Set total exempt
     */
    public function setTotalExempt(float $totalExempt): void
    {
        $this->totalExempt = $totalExempt;
    }

    /**
     * Get total exonerated
     */
    public function getTotalExonerated(): ?float
    {
        return $this->totalExonerated;
    }

    /**
     * Set total exonerated
     */
    public function setTotalExonerated(float $totalExonerated): void
    {
        $this->totalExonerated = $totalExonerated;
    }

    /**
     * Get total non taxable
     */
    public function getTotalNonTaxable(): ?float
    {
        return $this->totalNonTaxable;
    }

    /**
     * Set total non taxable
     */
    public function setTotalNonTaxable(float $totalNonTaxable): void
    {
        $this->totalNonTaxable = $totalNonTaxable;
    }

    /**
     * Get total sale
     */
    public function getTotalSale(): ?float
    {
        return $this->totalSale;
    }

    /**
     * Set total sale
     */
    public function setTotalSale(float $totalSale): void
    {
        $this->totalSale = $totalSale;
    }

    /**
     * Get total discounts
     */
    public function getTotalDiscounts(): ?float
    {
        return $this->totalDiscounts;
    }

    /**
     * Set total discounts
     */
    public function setTotalDiscounts(float $totalDiscounts): void
    {
        $this->totalDiscounts = $totalDiscounts;
    }

    /**
     * Get total net sale
     */
    public function getTotalNetSale(): ?float
    {
        return $this->totalNetSale;
    }

    /**
     * Set total net sale
     */
    public function setTotalNetSale(float $totalNetSale): void
    {
        $this->totalNetSale = $totalNetSale;
    }

    /**
     * Get total tax amount
     */
    public function getTotalTax(): ?float
    {
        return $this->totalTax;
    }

    /**
     * Set total tax amount
     */
    public function setTotalTax(float $totalTax): void
    {
        $this->totalTax = $totalTax;
    }

    /**
     * Get total voucher
     */
    public function getTotalVoucher(): ?float
    {
        return $this->totalVoucher;
    }

    /**
     * Set total voucher
     */
    public function setTotalVoucher(float $totalVoucher): void
    {
        $this->totalVoucher = $totalVoucher;
    }

    /**
     * Convert model to array
     */
    public function toArray(): array
    {
        return [
            'total_taxed_services' => $this->getTotalTaxedServices(),
            'total_exempt_services' => $this->getTotalExemptServices(),
            'total_exonerated_services' => $this->getTotalExoneratedServices(),
            'total_non_taxable_services' => $this->getTotalNonTaxableServices(),
            'total_taxed_goods' => $this->getTotalTaxedGoods(),
            'total_exempt_goods' => $this->getTotalExemptGoods(),
            'total_exonerated_goods' => $this->getTotalExoneratedGoods(),
            'total_non_taxable_goods' => $this->getTotalNonTaxableGoods(),
            'total_taxed' => $this->getTotalTaxed(),
            'total_exempt' => $this->getTotalExempt(),
            'total_exonerated' => $this->getTotalExonerated(),
            'total_non_taxable' => $this->getTotalNonTaxable(),
            'total_sale' => $this->getTotalSale(),
            'total_discounts' => $this->getTotalDiscounts(),
            'total_net_sale' => $this->getTotalNetSale(),
            'total_tax' => $this->getTotalTax(),
            'total_voucher' => $this->getTotalVoucher(),
            'taxes' => array_map(fn (Tax $tax) => $tax->toArray(), $this->getTaxes()),
        ];
    }
}
