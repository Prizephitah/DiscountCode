<?php

namespace Prizephitah\DiscountCode;

class User
{
    public const TYPE_USER = 1;
    public const TYPE_BRAND = 2;

    protected int $id;
    protected string $name;
    protected int $type;

    public function __construct(int $id, string $name, int $type)
    {
        $this
            ->setId($id)
            ->setName($name)
            ->setType($type)
        ;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setType(int $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getType(): int
    {
        return $this->type;
    }
}