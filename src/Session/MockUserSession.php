<?php

namespace Prizephitah\DiscountCode\Session;

use Prizephitah\DiscountCode\User;

class MockUserSession implements SessionInterface
{
    protected array $data = [];

    public function __construct()
    {
        $this->data['user'] = new User(123, 'Mock User', User::TYPE_USER);
    }

    public function get(string $key): mixed
    {
        return $this->data[$key];
    }

    public function set(string $key, mixed $value): void
    {
        $this->data[$key] = $value;
    }
}