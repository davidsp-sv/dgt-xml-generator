<?php

namespace DazzaDev\DgtXmlGenerator\Models\Payment;

use DazzaDev\DgtXmlGenerator\DataLoader;

class Payment
{
    /**
     * Payment method information
     */
    public PaymentMethod $paymentMethod;

    /**
     * Other payment method
     */
    public ?string $otherPaymentMethod = null;

    /**
     * Payment amount
     */
    public float $amount = 0.0;

    /**
     * Payment constructor
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize payment data
     */
    protected function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['payment_method'])) {
            $this->setPaymentMethod($data['payment_method']);
        }

        if (isset($data['other_payment_method'])) {
            $this->setOtherPaymentMethod($data['other_payment_method']);
        }

        if (isset($data['amount'])) {
            $this->setAmount($data['amount']);
        }
    }

    /**
     * Get payment method
     */
    public function getPaymentMethod(): PaymentMethod
    {
        return $this->paymentMethod;
    }

    /**
     * Set payment method
     */
    public function setPaymentMethod(PaymentMethod|array|int|string $paymentMethod): void
    {
        if (is_array($paymentMethod)) {
            $this->paymentMethod = new PaymentMethod($paymentMethod);
        } elseif (is_int($paymentMethod) || is_string($paymentMethod)) {
            $paymentMethodData = (new DataLoader('metodos-pago'))->getByCode($paymentMethod);
            $this->paymentMethod = new PaymentMethod($paymentMethodData);
        } else {
            $this->paymentMethod = $paymentMethod;
        }
    }

    /**
     * Get other payment method
     */
    public function getOtherPaymentMethod(): ?string
    {
        return $this->otherPaymentMethod;
    }

    /**
     * Set other payment method
     */
    public function setOtherPaymentMethod(string $otherPaymentMethod): void
    {
        $this->otherPaymentMethod = $otherPaymentMethod;
    }

    /**
     * Get payment amount
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Set payment amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'payment_method' => $this->getPaymentMethod()->toArray(),
            'other_payment_method' => $this->getOtherPaymentMethod(),
            'amount' => $this->getAmount(),
        ];
    }
}
