<?php

namespace Application\Exceptions;

use Exception;

class InvalidTransactionException extends Exception
{
    public function __construct($message = "Incorrect transaction", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}