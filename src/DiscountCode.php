<?php

namespace Prizephitah\DiscountCode;

class DiscountCode
{
    protected int $id;
    protected string $brandName;
    protected string $code;

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setBrandName(string $brandName): static
    {
        $this->brandName = $brandName;
        return $this;
    }

    public function getBrandName(): string
    {
        return $this->brandName;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;
        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public static function fromArray(array $values): static
    {
        return (new static())
            ->setId($values['id'])
            ->setBrandName($values['name'])
            ->setCode($values['code'])
        ;
    }
}