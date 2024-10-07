<?php

namespace Domain;

class Transaction
{
    private Currency $fromCurrency;
    private Currency $toCurrency;
    private float $amount;
    private string $type;

    public const TYPE_SELL = 'sell';
    public const TYPE_BUY = 'buy';

    public function __construct(Currency $fromCurrency, Currency $toCurrency, float $amount, string $type)
    {
        $this->fromCurrency = $fromCurrency;
        $this->toCurrency = $toCurrency;
        $this->amount = $amount;
        $this->type = $type;
    }

    public function getFromCurrency(): Currency
    {
        return $this->fromCurrency;
    }

    public function getToCurrency(): Currency
    {
        return $this->toCurrency;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getType(): string
    {
        return $this->type;
    }
}