<?php

namespace Prizephitah\DiscountCode;

class ValidationException extends \RuntimeException
{

    /**
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}