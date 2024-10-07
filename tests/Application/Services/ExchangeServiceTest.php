<?php

namespace tests\Application\Services;

use Application\Services\ExchangeService;
use Domain\Currency;
use Domain\Transaction;
use PHPUnit\Framework\TestCase;

class ExchangeServiceTest extends TestCase
{
    private ExchangeService $service;

    protected function setUp(): void
    {
        $this->service = new ExchangeService();
    }

    public function testSellEURToGBP(): void
    {
        $fromCurrency = new Currency('EUR');
        $toCurrency = new Currency('GBP');

        $transaction = new Transaction($fromCurrency, $toCurrency, 100,Transaction::TYPE_SELL);

        $convertedAmount = $this->service->convert($transaction);

        $this->assertEquals(155.21, $convertedAmount);
    }

    public function testBuyGBPWithEUR(): void
    {
        $fromCurrency = new Currency('EUR');
        $toCurrency = new Currency('GBP');

        $transaction = new Transaction($fromCurrency, $toCurrency, 100,Transaction::TYPE_BUY);

        $convertedAmount = $this->service->convert($transaction);

        $this->assertEquals(158.35, $convertedAmount);
    }
}