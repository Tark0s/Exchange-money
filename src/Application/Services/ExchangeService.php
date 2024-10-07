<?php

namespace Application\Services;

use Application\Exceptions\InvalidTransactionException;
use Application\ValueObjects\ExchangeRates;
use Domain\Currency;
use Domain\Transaction;

class ExchangeService
{
    private const FEE_PERCENTAGE = 0.01;

    public function convert(Transaction $transaction): float
    {
        $rate = $this->getRate($transaction->getFromCurrency(), $transaction->getToCurrency());

        if ($rate === null) {
            throw new InvalidTransactionException("No rate found for currency {$transaction->getFromCurrency()->getCode()} to {$transaction->getToCurrency()->getCode()}");
        }
        $convertedAmount = $transaction->getAmount() * $rate;

        $fee = $convertedAmount * self::FEE_PERCENTAGE;

        if ($transaction->getType() === Transaction::TYPE_SELL) {
            $finalAmount = floor(($convertedAmount - $fee) * 100) / 100;
        } elseif ($transaction->getType() === Transaction::TYPE_BUY) {
            $finalAmount = ceil(($convertedAmount + $fee) * 100) / 100;
        } else {
            throw new \InvalidArgumentException('Invalid transaction type');
        }

        return $finalAmount;
    }

    private function getRate(Currency $fromCurrency, Currency $toCurrency): ?float
    {
        return ExchangeRates::getRate($fromCurrency->getCode(), $toCurrency->getCode());
    }
}