<?php

namespace Tests\Domain;

use Domain\Currency;
use Domain\Transaction;
use PHPUnit\Framework\TestCase;

class TransactionTest extends TestCase
{
    public function testGetFromCurrencyReturnsCorrectCurrency()
    {
        $fromCurrency = new Currency('USD');
        $toCurrency = new Currency('EUR');
        $amount = 100.0;
        $type = Transaction::TYPE_SELL;

        $transaction = new Transaction($fromCurrency, $toCurrency, $amount, $type);

        $this->assertSame($fromCurrency, $transaction->getFromCurrency());
    }

    public function testGetToCurrencyReturnsCorrectCurrency()
    {
        $fromCurrency = new Currency('USD');
        $toCurrency = new Currency('EUR');
        $amount = 100.0;
        $type = Transaction::TYPE_SELL;

        $transaction = new Transaction($fromCurrency, $toCurrency, $amount, $type);

        $this->assertSame($toCurrency, $transaction->getToCurrency());
    }

    public function testGetAmountReturnsCorrectAmount()
    {
        $fromCurrency = new Currency('USD');
        $toCurrency = new Currency('EUR');
        $amount = 100.0;
        $type = Transaction::TYPE_SELL;

        $transaction = new Transaction($fromCurrency, $toCurrency, $amount, $type);

        $this->assertSame($amount, $transaction->getAmount());
    }

    public function testGetTypeReturnsCorrectType()
    {
        $fromCurrency = new Currency('USD');
        $toCurrency = new Currency('EUR');
        $amount = 100.0;
        $type = Transaction::TYPE_SELL;

        $transaction = new Transaction($fromCurrency, $toCurrency, $amount, $type);

        $this->assertSame($type, $transaction->getType());
    }
}
