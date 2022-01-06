<?php

namespace Prizephitah\DiscountCode\Database;

class MockStatement implements StatementInterface
{
    protected string $brand = 'Generic Company';

    public function bindValue(string $parameterName, mixed $value): void
    {
        if ($parameterName === 'slug') {
            $this->brand = \mb_convert_case($value, MB_CASE_TITLE);
        }
        return;
    }

    public function execute(): void
    {
        return;
    }

    public function fetch(): array|bool
    {
        return ['id' => 1337, 'name' => $this->brand, 'code' => mb_strtoupper(uniqid())];
    }
}