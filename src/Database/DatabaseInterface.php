<?php

namespace Prizephitah\DiscountCode\Database;

interface DatabaseInterface
{
    public function prepare(string $query): StatementInterface;
}