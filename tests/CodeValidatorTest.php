<?php

namespace Prizephitah\DiscountCode\Test;

use Prizephitah\DiscountCode\CodeValidator;
use PHPUnit\Framework\TestCase;
use Prizephitah\DiscountCode\DiscountCode;
use Prizephitah\DiscountCode\ValidationException;

class CodeValidatorTest extends TestCase
{
    protected CodeValidator $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = new CodeValidator();
    }

    public function testValidation()
    {
        $code = (new DiscountCode())
            ->setId(1)
            ->setBrandName('Test')
            ->setCode('F00')
        ;
        $result = $this->validator->validate($code);
        $this->assertNull($result);
    }

    public function testValidateWithoutId()
    {
        $codeWithoutId = (new DiscountCode())
            ->setBrandName('Test')
            ->setCode('BAR')
        ;
        $this->expectException(ValidationException::class);
        $this->validator->validate($codeWithoutId);
    }
}
