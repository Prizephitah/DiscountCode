<?php

namespace Prizephitah\DiscountCode\Database;

class MockDatabase implements DatabaseInterface
{

    public function prepare(string $query): StatementInterface
    {
       return new MockStatement();
    }
}