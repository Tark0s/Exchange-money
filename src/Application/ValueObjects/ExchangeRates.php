<?php

namespace Application\ValueObjects;

class ExchangeRates
{
    private const RATES = [
        'EUR' => [
            'GBP' => 1.5678,
        ],
        'GBP' => [
            'EUR' => 1.5432
        ]
    ];

    public static function getRate(string $fromCurrency, string $toCurrency): ?float
    {
        if (isset(self::RATES[$fromCurrency][$toCurrency])) {
            return self::RATES[$fromCurrency][$toCurrency];
        }

        return null;
    }
}