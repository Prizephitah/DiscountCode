<?php

namespace Prizephitah\DiscountCode;

class CodeValidator
{
    public function __construct()
    {
        // Any dependencies for validation a code goes here
    }

    /**
     * @param DiscountCode $code
     * @throws ValidationException When $code fails validation.
     * @return void
     */
    public function validate(DiscountCode $code): void
    {
        $this->validatePopulatedFields($code);
    }

    /**
     * @param DiscountCode $code
     * @throws ValidationException When $code is missing values for mandatory fields.
     * @return self
     */
    protected function validatePopulatedFields(DiscountCode $code): self
    {
        if (empty($code->getId())) {
            throw new ValidationException('Missing field "id".');
        }

        if (empty($code->getBrandName())) {
            throw new ValidationException('Missing field "name".');
        }

        if (empty($code->getCode())) {
            throw new ValidationException('Missing field "code".');
        }

        return $this;
    }
}