<?php

namespace Prizephitah\DiscountCode\Api;

use Prizephitah\DiscountCode\CodeController;
use Prizephitah\DiscountCode\Session\SessionInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Api
{
    protected ContainerInterface $container;
    protected SessionInterface $session;

    public function __construct(ContainerInterface $container, SessionInterface $session) {
        $this->container = $container;
        $this->session = $session;
    }

    public function getCode(ServerRequestInterface $request, ResponseInterface $response, string $brand, CodeController $codeController): ResponseInterface {
        try {
            $code = $codeController->getCode($brand, $this->session->get('user'));

            $response->getBody()->write(json_encode(DiscountCode::fromModel($code)));
            return $response->withHeader('Content-Type', 'application/json');
        } catch (\Throwable $t) {
            //TODO Log error
            $response->getBody()->write('Internal server error.');
            return $response->withStatus(500);
        }
    }
}