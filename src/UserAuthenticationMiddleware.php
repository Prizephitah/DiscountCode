<?php

namespace Prizephitah\DiscountCode;

use GuzzleHttp\Psr7\Response;
use Prizephitah\DiscountCode\Session\SessionInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class UserAuthenticationMiddleware
{
    protected SessionInterface $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if (self::validateUser($this->session->get('user')) === false) {
            return new Response(403);
        }

        return $handler->handle($request);
    }

    protected static function validateUser(User $user = null): bool
    {
        if ($user === null) {
            return false;
        }

        return $user->getType() === User::TYPE_USER;
    }
}