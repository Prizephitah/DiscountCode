<?php

namespace Prizephitah\DiscountCode\Api;

use Prizephitah\DiscountCode\DiscountCode;

/**
 * @OA\Schema(
 *     schema="DiscountCodeResponse",
 *     title="A discount code",
 *     @OA\Property(type="string", property="brandName"),
 *     @OA\Property(type="string", property="code")
 * )
 */
class DiscountCodeResponse implements \JsonSerializable
{
    protected string $brandName;
    protected string $code;

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

    public static function fromModel(DiscountCode $model): static
    {
        return (new static())
            ->setBrandName($model->getBrandName())
            ->setCode($model->getCode())
        ;
    }

    public function jsonSerialize()
    {
        return [
            'brandName' => $this->getBrandName(),
            'code' => $this->getCode()
        ];
    }
}