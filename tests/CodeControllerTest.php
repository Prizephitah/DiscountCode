<?php

namespace Prizephitah\DiscountCode\Test;

use Prizephitah\DiscountCode\CodeController;
use PHPUnit\Framework\TestCase;
use Prizephitah\DiscountCode\CodeValidator;
use Prizephitah\DiscountCode\Database\MockDatabase;
use Prizephitah\DiscountCode\DiscountCode;
use Prizephitah\DiscountCode\User;

class CodeControllerTest extends TestCase
{
    protected CodeController $controller;

    public function setUp(): void
    {
        parent::setUp();
        $this->controller = new CodeController(new MockDatabase(), new CodeValidator());
    }

    public function testGetCode()
    {
        $code = $this->controller->getCode('test-brand', new User(1, 'Test', User::TYPE_USER));
        $this->assertInstanceOf(DiscountCode::class, $code);
        $this->assertEquals('Test-Brand', $code->getBrandName());
        $this->assertNotEmpty($code->getCode());
        $this->assertNotEmpty($code->getCode());
    }
}
