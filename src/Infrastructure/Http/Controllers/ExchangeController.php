<?php

namespace Infrastructure\Http\Controllers;

use Application\Exceptions\InvalidTransactionException;
use Application\Services\ExchangeService;
use Domain\Currency;
use Domain\Transaction;

class ExchangeController
{
    private ExchangeService $exchangeService;

    public function __construct(ExchangeService $exchangeService)
    {
        $this->exchangeService = $exchangeService;
    }

    public function exchange(): void
    {
        $isError = false;

        $fromCurrency = new Currency($_POST['fromCurrency']);
        $toCurrency = new Currency($_POST['toCurrency']);
        $amount = (float) $_POST['amount'];
        $type = $_POST['type'];

        $transaction = new Transaction($fromCurrency, $toCurrency, $amount, $type);

        try {
            $convertedAmount = $this->exchangeService->convert($transaction);
        } catch (InvalidTransactionException $e) {
            $isError = true;
            echo json_encode(['error' => $e->getMessage()]);
        }

        if (!$isError) {
            echo json_encode(['convertedAmount' => $convertedAmount]);
        }
    }
}