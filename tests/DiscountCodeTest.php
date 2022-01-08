<?php

namespace Prizephitah\DiscountCode\Test;

use Prizephitah\DiscountCode\DiscountCode;
use PHPUnit\Framework\TestCase;

class DiscountCodeTest extends TestCase
{

    public function testFromArray()
    {
        $arrayData = ['id' => 999, 'name' => 'Test', 'code' => 'F00BAR'];
        $code = DiscountCode::fromArray($arrayData);
        $this->assertInstanceOf(DiscountCode::class, $code);
        $this->assertEquals($arrayData['id'], $code->getId());
        $this->assertEquals($arrayData['name'], $code->getBrandName());
        $this->assertEquals($arrayData['code'], $code->getCode());
    }
}
