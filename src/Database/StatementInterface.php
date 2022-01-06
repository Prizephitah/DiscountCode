<?php

namespace Prizephitah\DiscountCode\Database;

interface StatementInterface
{
    public function bindValue(string $parameterName, mixed $value): void;
    public function execute(): void;
    public function fetch(): array|bool;
}