<?php

namespace Prizephitah\DiscountCode\Session;

interface SessionInterface
{
    public function get(string $key): mixed;
    public function set(string $key, mixed $value): void;
}