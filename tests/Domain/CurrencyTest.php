<?php

namespace Tests\Domain;

use Domain\Currency;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testGetCodeReturnsCorrectCode()
    {
        $currency = new Currency('USD');
        $this->assertSame('USD', $currency->getCode());
    }
}